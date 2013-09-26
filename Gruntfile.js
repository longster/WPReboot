'use strict';
module.exports = function(grunt) {

  grunt.initConfig({
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
    watch: {
      less: {
        files: [
          'assets/less/custom/*.less'
        ],
        tasks: ['recess']
      }
    },
    clean: {
      dist: [
        'style.css'
      ]
    }
  });

  // Load tasks
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-recess');

  // Register tasks
  grunt.registerTask('default', [
    'clean',
    'recess' 
  ]);
  grunt.registerTask('dev', [
    'watch'
  ]);

};