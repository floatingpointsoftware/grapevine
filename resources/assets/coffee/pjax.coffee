# required pjax variables
timeout = 5000
loader = $('#loader')
document = $('body')

# Whenever a form is submitted, make sure it goes via the pjax implementation
submissionCallback = (event) ->
	$.pjax.submit(event, pjaxContainer)

# Setup our required PJAX handlers and listeners
document.pjax('a', '#pjax-container', {"timeout": timeout})
document.on('submit', 'form[data-pjax]', submissionCallback)

# Just in case the load time is really fast, we don't bother showing the loader.
document.on 'pjax:send', ->
	loader.show().fadeTo(250, 0.9)

# Whenever the loading is complete, we then want to hide the loading animation
document.on 'pjax:end', ->
	loaderCallback = ->
		$(this).hide()

	loader.fadeTo(250, 0, loaderCallback)
