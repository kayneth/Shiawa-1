var Encore = require('@symfony/webpack-encore');

Encore
// directory where all compiled assets will be stored
    .setOutputPath('web/build/')

    // what's the public path to this directory (relative to your project's document root dir)
    .setPublicPath('/build')

    // empty the outputPath dir before each build
    .cleanupOutputBeforeBuild()

    // will output as web/build/app.js
    .addEntry('app', './assets/js/main.js')
    .addEntry('admin', './assets/js/admin.js')

    // will output as web/build/global.css
    .addStyleEntry('global', './assets/scss/global.scss')
    .addStyleEntry('article', './assets/scss/global.scss')

    // allow sass/scss files to be processed
    .enableSassLoader(function(sassOptions) {})

    // allow legacy applications to use $/jQuery as a global variable
    // .autoProvidejQuery()
    .autoProvideVariables({
        jQuery: 'jquery',
        $: 'jquery',
        'window.jQuery': 'jquery',
        // 'Materialize': 'Materialize',
    })
    .createSharedEntry('vendor', [
        'jquery',
        'materialize-css'
    ])

    .enableReactPreset()
    // Enable TypeScript
    // .enableTypeScriptLoader(function(tsConfig) {})
    .enablePostCssLoader()
    .enableSourceMaps(!Encore.isProduction())
    // create hashed filenames (e.g. app.abc123.css)
    .enableVersioning()
;

// export the final configuration
module.exports = Encore.getWebpackConfig();