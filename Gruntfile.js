'use strict';
module.exports = function(grunt) {

    // auto-load all grunt tasks matching the `grunt-*` pattern in package.json
    require('load-grunt-tasks')(grunt); // no need for grunt.loadNpmTasks!

    grunt.initConfig({
			pkg:    grunt.file.readJSON( 'package.json' ),
        
		 // watch for changes and trigger sass, jshint, uglify and livereload
        watch: {
            sass: {
					options: { 
						sourcemap: true 
					},
                files: ['assets/css/sass/**/*.{scss,sass}'],
                tasks: [
					 	'sass', 
						'autoprefixer'
					]
            },
            js: {
                files: '<%= jshint.all %>',
                tasks: ['jshint']
            },
            livereload: {
                options: { livereload: true },
                files: [ 
					 	'*.php', 
						'lib/**/*.php', 
						'Gruntfile.js',
						'style.css', 
						'assets/js/source/**/*.js', 
						'assets/images/**/*.{png,jpg,jpeg,gif,webp,svg}']
            }
        },
		


			// Modernizr
			modernizr: {
    			dist: {
        			// [REQUIRED] Path to the build you're using for development.
        			"devFile" : "assets/bower_components/modernizr/modernizr.js",

        			// Path to save out the built file.
        			"outputFile" : "assets/js/source/vendor/modernizr-custom.js",
		    	}

			},

        // sass
        sass: {
            dist: {
                options: {
                    sourcemap: true,
                    style: 'expanded',
                },
                files: {
                    'style.css': 'assets/css/sass/styles.scss',
                }
            }
        },

        // autoprefixer
        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 9', 'ios 6', 'android 4', 'android 3'],
                map: true,
					 silent: false,
            },
				dist: { // Target
					files: {
                	'style.css': 'style.css'
						}
            },
        },

		  	bump: {
    			options: {
      			updateConfigs: ['pkg'], // make sure to check updated pkg variables
      			createTag: false,
      			push: false,
    			}
  			},

	



		 // Version
		 version: {
		 	css: {
        		options: {
            	prefix: 'Version\\:\\s'
        		},
        		src: [ 'style.css' ],
   		},
		 	sass: {
        		options: {
            	prefix: 'Version\\:\\s'
        		},
        		src: [ 'assets/css/sass/styles.scss' ],
   		}		},


        // javascript linting with jshint
        jshint: {
            options: {
                jshintrc: '.jshintrc',
                "force": true
            },
            all: [
                'Gruntfile.js',
                'assets/js/source/**/*.js'
            ]
        },
			
	

	

        // image optimization
        imagemin: {
            dist: {
                options: {
                    optimizationLevel: 7,
                    progressive: true,
                    interlaced: true
                },
                files: [{
                    expand: true,
                    cwd: 'assets/images/',
                    src: ['**/*.{png,jpg,gif}'],
                    dest: 'assets/images/'
                }]
            }
        },

		  // Copy the plugin to a versioned release directory
		  copy: {
			dist: {
				files:  [
      			{expand: true, 
					cwd: '',
					src: [
						'**/*',
						'!style.css.map',
						'!**/assets/css/sass/**',
						'!**/assets/components/**',
						'!**/node_modules/**',
						'!**/dist/**',
						'!.gitattributes',
						'!.gitignore',
						'!.jshintrc',
						'!bower.json',
						'!.bowerrc',
						'!Gruntfile.js',
						'!package.json',
						'!README.md',
					], 
					dest: 'dist/<%= pkg.name %>.<%= pkg.version %>/'},
				],
			},

			font_awesome: {
				 expand: true,
				 flatten: true,
				 src: ['assets/components/fontawesome/fonts/*'],
				 dest: 'assets/fonts'
			},
			modernizr: {
				 expand: true,
				 flatten: true,
				 src: ['assets/components/modernizr/modernizr.js'],
				 dest: 'assets/js/source/vendor'
			},
		},

		clean: {
			dist: [
				'dist/<%= pkg.name %>.<%= pkg.version %>'
			],
		
		},

		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: 'dist/<%= pkg.name %>.<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: 'dist/<%= pkg.name %>.<%= pkg.version %>',
				src: ['**/*'],
				dest: '<%= pkg.name %>/'
			}		
		}

    });

    // register tasks

    grunt.registerTask('default', [
	 	'sass', 
		'autoprefixer',
		'watch'
	]);

		
	// Copy assets from bower_components to theme dir
	grunt.registerTask('components', [
		'copy:font_awesome',
		'copy:modernizr'
	]);	

	// Compress theme for upload to server
	grunt.registerTask('dist', [
		'bump:minor',
		'version',
		'imagemin',
		'copy:dist', 				
		//'compress',
		//'clean:dist',
	]);	

};
