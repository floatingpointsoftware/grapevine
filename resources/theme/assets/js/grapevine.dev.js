(function() {
  var document, loader, submissionCallback, timeout;

  timeout = 5000;

  loader = $('#loader');

  document = $('body');

  submissionCallback = function(event) {
    return $.pjax.submit(event, pjaxContainer);
  };

  document.pjax('a', '#pjax-container', {
    "timeout": timeout
  });

  document.on('submit', 'form[data-pjax]', submissionCallback);

  document.on('pjax:send', function() {
    return loader.show().fadeTo(250, 0.9);
  });

  document.on('pjax:end', function() {
    var loaderCallback;
    loaderCallback = function() {
      return $(this).hide();
    };
    return loader.fadeTo(250, 0, loaderCallback);
  });

}).call(this);
