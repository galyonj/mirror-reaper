/***********************************************************
 * Usage:
 * For the default task to run, the user must first provide
 * the directory they wish to run it on as a flag for the
 * gulp task, like so:
 * ---
 * gulp -p <directory-name> or
 * gulp --process <directory-name>
 * ---
 * No processing will take place unless the directory name
 * is properly entered.
 ***********************************************************/

'use strict';

// Gulp manifest
const autoprefix = require( 'gulp-autoprefixer' );
const concat     = require( 'gulp-concat' );
const gulp       = require( 'gulp' );
const jshint     = require( 'gulp-jshint' );
const cwd        = require( 'readdir-enhanced' ).sync( 'dev', { filter: /^[A-z].+\w/i } );
const rename     = require( 'gulp-rename' );
const sass       = require( 'gulp-sass' );
const uglify     = require( 'gulp-uglify' );
const util       = require( 'gulp-util' );
const yargonaut  = require( 'yargonaut' )
	.help('Calvin S')
	.helpStyle('green')
	.errors('Calvin S')
	.errorsStyle('red');
const yargs      = require( 'yargs' )
	.option( 'p', {
		alias: 'process',
		choices: cwd,
		describe: 'Enter the directory you wish to process.'
	} )
	.demandOption( [ 'process' ], 'Please enter a valid working directory for processing.' )
	.help()
	.argv;

// Now we use what the user entered to set the
// directory variable for both input and output
var dir = yargs.process;

gulp.task( 'lint', function() {
	return gulp
		.src( 'dev/' + dir + '/js/**/*.js' )
		.pipe( jshint() )
		.pipe( jshint.reporter( 'jshint-stylish', { beep: true } ) );
});

gulp.task( 'scripts', function() {
	return gulp
		.src( [ 'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js', 'node_modules/smooth-scroll/dist/js/smooth-scroll.js', 'dev/' + dir + '/js/main.js' ] )
		.pipe( concat( 'main.js' ) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( uglify() )
		.on( 'error', function( err ) { util.log(util.colors.red( '[Error]' ), err.toString() ); } )
		.pipe( gulp.dest( 'site/web/app/themes/' + dir ) );
});

// setup for autoprefixer
var autoprefixerOptions =  {
	browsers: [ 'last 2 versions', '> 5%' ]
};

gulp.task( 'sass', function() {
	return gulp
		.src( 'dev/' + dir + '/css/*.scss' )
		.pipe( sass( { includePaths: require( 'node-bourbon' ).includePaths } ) )
		.pipe( autoprefix( autoprefixerOptions ) )
		.pipe( gulp.dest( 'site/web/app/themes/' + dir ) )
		.pipe( sass( { outputStyle: 'expanded' } ) )
		.pipe( rename( { suffix: '.min'} ) )
		.pipe( sass( { outputStyle: 'compressed' } ) )
		.pipe( gulp.dest( 'site/web/app/themes/' + dir ) );
	//.resume();
});

gulp.task( 'watch', function() {
	gulp.watch( 'dev/' + dir + '/js/**/*.js', [ 'lint', 'scripts' ] );
	gulp.watch( [ 'dev/' + dir + '/css/**/*.scss' ], [ 'sass' ] );
});

gulp.task( 'default', [ 'lint', 'scripts', 'sass', 'watch' ] );