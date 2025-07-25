// This library allows us to combine paths easily

module.exports = {
  entry: {
    bootstrap: ["./src/js/bootstrap.js"],
    "kraken.alert.display": ["./src/js/kraken.alert.display.js"],
    "kraken.dismiss": ["./src/js/kraken.dismiss.js"],
    "kraken.mediaquery": ["./src/js/kraken.mediaquery.js"],
    "kraken.misc": ["./src/js/kraken.misc.js"],
    "kraken.scroll": ["./src/js/kraken.scroll.js"],
    "kraken.sticky": ["./src/js/kraken.sticky.js"],
    "kraken.video": ["./src/js/kraken.video.js"],
    "tiny.slider": ["./src/js/tiny.slider.js"],
  },
  optimization: {
    splitChunks: {
      hidePathInfo: true,
      cacheGroups: {
        defaultVendors: {
          idHint: "vendors",
        },
        vendorbootstrap: {
          test: /[\\/]node_modules[\\/](bootstrap|@popperjs)[\\/]/,
          name: "vendors~bootstrap",
          chunks: "all",
        },
        vendortinyslider: {
          test: /[\\/]node_modules[\\/](tiny-slider)[\\/]/,
          name: "vendors~tiny.slider",
          chunks: "all",
        },
      },
    },
    chunkIds: "named",
  },
};
