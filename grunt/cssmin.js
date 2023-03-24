/* jshint node:true */
// https://github.com/gruntjs/grunt-contrib-cssmin
module.exports = {
  options: {
    mergeIntoShorthands: false,
    roundingPrecision: -1,
    sourceMap: false,
    keepSpecialComments: 0,
    level: {
      1: {
        specialComments: 0,
      },
    },
  },
  customizerStyle: {
    files: {
      'assets/css/mega-menu-legacy.min.css': [
        'assets/css/mega-menu-legacy.css',
      ],
      'assets/css/mega-menu-legacy-rtl.min.css': [
        'assets/css/mega-menu-legacy-rtl.css',
      ],
      'assets/css/style-legacy-rtl.min.css': [
        'assets/css/style-legacy-rtl.css',
      ],
      'assets/css/style-legacy.min.css': ['assets/css/style-legacy.css'],
      'assets/css/woocommerce-legacy.min.css': [
        'assets/css/woocommerce-legacy.css',
      ],
      'assets/css/woocommerce-legacy-rtl.min.css': [
        'assets/css/woocommerce-legacy-rtl.css',
      ],
      'assets/css/lifter-legacy.min.css': [
        'assets/css/lifter-legacy.css',
      ],
      'assets/css/gutenberg-editor-legacy-style.min.css': [
        'assets/css/gutenberg-editor-legacy-style.css',
      ],
    },
  },
};
