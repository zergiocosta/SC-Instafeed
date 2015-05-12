// -------------------------------------------------------
// Gruntfile.js for Sergio Costa's projects
// Version: 2.0.0
//
// Author:  Sergio Costa
// URL:     http://www.sergiocosta.net.br
// Contact: sergio.costa@outlook.com
// -------------------------------------------------------
"use strict";

module.exports = function(grunt) {

    // Para instalar matchdep na pasta src do projeto: $ npm install matchdep
    require("matchdep").filterDev("grunt-*").forEach(grunt.loadNpmTasks);

    var projectConfig = {

        // Setting Directories
        dirs: {
            app:  "../",
            js:   "../js",
            sass: "../sass",
            css:  "../css",
        },

        // Metadata
        pkg: grunt.file.readJSON("package.json"),
        banner:
        "\n" +
        "/*\n" +
         "* -------------------------------------------------------\n" +
         "* Project: Sergio Costa InstaFeed\n" +
         "* Version: 1.0.0\n" +
         "*\n" +
         "* Author:  Sergio Costa and InstaFeed\n" +
         "* URL:     http://sergiocosta.net.br and http://instafeedjs.com\n" +
         "* Contact: sergio.costa@outlook.com.com\n" +
         "*\n" +
         "*---------------------------------------------------------\n" +
         "*/\n" +
         "",

        // Watch 
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-watch --save-dev
        watch: {
            options: {
                livereload: true
            },
            compass: {
                files: [
                    "<%= dirs.css %>/{,*/}*.css",
                    "<%= dirs.sass %>/{,*/}*.{scss,sass}"
                ],
                tasks: ["compass", "notify:compass"]
            },
            js: {
                files: [
                    "<%= dirs.js %>/sc-instafeed.js"
                ],
                tasks: ["uglify", "notify:js"]
            }
        },

        // Uglify
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-uglify --save-dev
        uglify: {
            options: {
                mangle: false,
                banner: "<%= banner %>"
            },
            dist: {
                files: {
                    "<%= dirs.js %>/sc-instafeed.min.js": [
                        "<%= dirs.js %>/sc-instafeed.js"
                    ]

                }
            }
        },

        // Compass
        // Para instalar na pasta src do projeto: $ npm install grunt-contrib-compass --save-dev
        compass: {
            dist: {
                options: {
                    sassDir: '../sass',
                    cssDir: '../css',
                    environment: "development",
                    outputStyle: "compressed",
                    force: true,
                    config: "config.rb"
                }
            }
        },

        // Notify
        // Para instalar na pasta src do projeto: $ npm install grunt-notify --save-dev
        notify: {
          compass: {
            options: {
              title: "SASS - <%= pkg.title %>",
              message: "Compilado e minificado com sucesso!"
            }
          },
          js: {
            options: {
              title: "Javascript - <%= pkg.title %>",
              message: "Minificado e validado com sucesso!"
            }
          },
        },

    };

    // Init Grunt
        grunt.initConfig(projectConfig);

    // Register Tasks
    // ----------------

    // Watch Project - $ grunt
    grunt.registerTask( "default", [ "watch" ]);

    // Uglify js - $ grunt u
    grunt.registerTask( "u", [ "uglify" ]);


};