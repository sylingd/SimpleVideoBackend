define({ "api": [
  {
    "type": "post",
    "url": "/upload/image",
    "title": "上传图片",
    "name": "UploadImage",
    "group": "Upload",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "file",
            "description": "<p>图片</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data",
            "description": "<p>Path</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Module/Api/Controller/Upload.php",
    "groupTitle": "Upload",
    "sampleRequest": [
      {
        "url": "http://video.sy/api/upload/image"
      }
    ]
  },
  {
    "type": "post",
    "url": "/user/register",
    "title": "注册新用户",
    "name": "UserRegister",
    "group": "User",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>用户名</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "avatar",
            "description": "<p>头像</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>EMail</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>密码</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "nickname",
            "description": "<p>昵称</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>信息</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.id",
            "description": "<p>用户ID</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Module/Api/Controller/User.php",
    "groupTitle": "User",
    "sampleRequest": [
      {
        "url": "http://video.sy/api/user/register"
      }
    ]
  },
  {
    "type": "get",
    "url": "/video/get/:id",
    "title": "获取视频详情",
    "name": "GetVideo",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>用户ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data",
            "description": "<p>详情</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "data.video",
            "description": "<p>视频详情</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.video.id",
            "description": "<p>视频ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.video.category",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.video.user",
            "description": "<p>上传用户</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.video.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.video.image",
            "description": "<p>视频Logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.video.aid",
            "description": "<p>视频aid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.video.cid",
            "description": "<p>视频cid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.video.create_time",
            "description": "<p>上传时间</p>"
          },
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data.comment",
            "description": "<p>评论列表</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.comment.id",
            "description": "<p>评论ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.comment.video",
            "description": "<p>视频ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.comment.user",
            "description": "<p>用户ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.comment.zan",
            "description": "<p>点赞数量</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.comment.body",
            "description": "<p>评论内容</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.comment.create_time",
            "description": "<p>评论时间</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Module/Api/Controller/Video.php",
    "groupTitle": "Video",
    "sampleRequest": [
      {
        "url": "http://video.sy/api/video/get/:id"
      }
    ]
  },
  {
    "type": "get",
    "url": "/video/list/:id",
    "title": "获取某一分类下的视频列表",
    "name": "GetVideoList",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>分类ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>视频列表</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.category",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.user",
            "description": "<p>上传用户</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.image",
            "description": "<p>视频Logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.aid",
            "description": "<p>视频aid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.cid",
            "description": "<p>视频cid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.create_time",
            "description": "<p>上传时间</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Module/Api/Controller/Video.php",
    "groupTitle": "Video",
    "sampleRequest": [
      {
        "url": "http://video.sy/api/video/list/:id"
      }
    ]
  },
  {
    "type": "get",
    "url": "/video/user/:id",
    "title": "获取某一用户上传的视频列表",
    "name": "GetVideoUser",
    "group": "Video",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Int",
            "optional": false,
            "field": "id",
            "description": "<p>用户ID</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "data",
            "description": "<p>视频列表</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.id",
            "description": "<p>视频ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.category",
            "description": "<p>分类ID</p>"
          },
          {
            "group": "Success 200",
            "type": "Int",
            "optional": false,
            "field": "data.user",
            "description": "<p>上传用户</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.name",
            "description": "<p>视频名称</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.image",
            "description": "<p>视频Logo</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.aid",
            "description": "<p>视频aid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.cid",
            "description": "<p>视频cid</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "data.create_time",
            "description": "<p>上传时间</p>"
          }
        ]
      }
    },
    "version": "0.0.0",
    "filename": "app/Module/Api/Controller/Video.php",
    "groupTitle": "Video",
    "sampleRequest": [
      {
        "url": "http://video.sy/api/video/user/:id"
      }
    ]
  }
] });
