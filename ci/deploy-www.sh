#!/bin/bash

main() {
	# Only push
	if [[ "$TRAVIS_EVENT_TYPE" != "push" ]];then
		echo -e "Not push, skip deploy www\n"
		return 0
	fi
	# Only master
	if [[ "$TRAVIS_BRANCH" != "master" ]];then
		echo -e "Not master, skip deploy www\n"
		return 0
	fi

	github_repo="sylingd/SimpleVideoBackend"
	github_branch="gh-pages"

	# Install node
	node_ver="10.15.3"
	curl -o ~/.nvm/nvm.sh https://raw.githubusercontent.com/creationix/nvm/v0.34.0/nvm.sh
	source ~/.nvm/nvm.sh
	nvm install $node_ver
	nvm use $node_ver
	nvm alias default $node_ver
	npm install -g apidoc
	node --version

	cd $TRAVIS_BUILD_DIR
	mkdir -p build/www

	# Build
	cd $TRAVIS_BUILD_DIR
	apidoc -i ./app -o ./build/www/

	# Upload
	cd $TRAVIS_BUILD_DIR/build/www/
	git init
	git config user.name "Deployment Bot"
	git config user.email "deploy@travis-ci.org"
	git add .
	git commit -m "Automatic deployment"
	git push --force --quiet "https://${GITHUB_TOKEN}@github.com/${github_repo}.git" master:$github_branch
}

main