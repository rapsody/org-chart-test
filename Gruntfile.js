'use strict';

// Project configuration.
grunt.initConfig({
  uglify: {
    options: {
      mangle: false
    },
    my_target: {
      files: {
        'public/assets/js/main.min.js': ['public/assets/js/main.js']
      }
    }
  }
});