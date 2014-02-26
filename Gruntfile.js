'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: [
        'Gruntfile.js',
        'assets/js/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    less: {
      dist: {
        files: {
          'style.css': [ //Automatically convert less to css
            'assets/less/custom/style.less', //Original files
          ]
        },
        options: {
          compress: true,
          // LESS source map
          // To enable, set sourceMap to true and update sourceMapRootpath based on your install
          sourceMap: false,
          sourceMapFilename: '',
          sourceMapRootpath: ''
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [ //Automatically combine and min all js to this single file
            'assets/js/bootstrap/3.1.1/transition.js',
            'assets/js/bootstrap/3.1.1/alert.js',
            'assets/js/bootstrap/3.1.1/button.js',
            'assets/js/bootstrap/3.1.1/carousel.js',
            'assets/js/bootstrap/3.1.1/collapse.js',
            'assets/js/bootstrap/3.1.1/dropdown.js',
            'assets/js/bootstrap/3.1.1/modal.js',
            'assets/js/bootstrap/3.1.1/tooltip.js',
            'assets/js/bootstrap/3.1.1/popover.js',
            'assets/js/bootstrap/3.1.1/scrollspy.js',
            'assets/js/bootstrap/3.1.1/tab.js',
            'assets/js/bootstrap/3.1.1/affix.js',
            'assets/js/_*.js'
          ]
        }
      }
    },
    watch: {
      less: {
        files: [
          'assets/less/custom/*.less',
        ],
        tasks: ['less']
      },
      js: {
        files: [
          '<%= jshint.all %>'
        ],
        tasks: ['jshint', 'uglify']
      },
      livereload: {
        // Browser live reloading
        // https://github.com/gruntjs/grunt-contrib-watch#live-reloading
        options: {
          livereload: false
        },
        files: [
          'assets/css/main.min.css',
          'assets/js/scripts.min.js',
          'modules/*.php',
          '*.php'
        ]
      }
    },
    clean: {
      dist: [
        'style.css',
        'assets/js/scripts.min.js'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'less',
    'uglify'
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};