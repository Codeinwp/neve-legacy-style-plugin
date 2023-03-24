const sass = require('node-sass');

module.exports = {
  style: {
    options: {
      implementation: sass,
      outputStyle: 'expanded',
      sourceMap: true,
    },
    files: [
      {
        'assets/css/style-legacy.css': 'assets/scss/style-legacy.scss',
        'assets/css/mega-menu-legacy.css': 'assets/scss/mega-menu-legacy.scss',
        'assets/css/woocommerce-legacy.css': 'assets/scss/woocommerce-legacy.scss',
        'assets/css/lifter-legacy.css': 'assets/scss/lifter-legacy.scss',
        'assets/css/gutenberg-editor-legacy-style.css': 'assets/scss/gutenberg-editor-legacy-style.scss',
      },
    ],
  },
};
