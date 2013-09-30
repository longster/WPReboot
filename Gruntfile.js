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
        'assets/js/bootstrap3/*.js',
        'assets/js/vendor/*.js',
        '!assets/js/scripts.min.js'
      ]
    },
    recess: {
      dist: {
        options: {
          compile: true,
          compress: true
        },
        files: {
          'style.css': [ //Automatically convert less to css
            'assets/less/custom/style.less' //Original files
          ]
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'assets/js/scripts.min.js': [
            'assets/js/bootstrap3/transition.js',
            'assets/js/bootstrap3/alert.js',
            'assets/js/bootstrap3/button.js',
            'assets/js/bootstrap3/carousel.js',
            'assets/js/bootstrap3/collapse.js',
            'assets/js/bootstrap3/dropdown.js',
            'assets/js/bootstrap3/modal.js',
            'assets/js/bootstrap3/tooltip.js',
            'assets/js/bootstrap3/popover.js',
            'assets/js/bootstrap3/scrollspy.js',
            'assets/js/bootstrap3/tab.js',
            'assets/js/bootstrap3/affix.js',
            'assets/js/vendor/*.js',
            'assets/js/_*.js'
          ]
        }
      }
    },
    watch: {
      less: {
        files: [
          'assets/less/custom/*.less'
        ],
        tasks: ['recess']
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
          'module/*.php',
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
  grunt.loadNpmTasks('grunt-recess');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'uglify',
    'recess' 
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};