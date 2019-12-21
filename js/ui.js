// ui functions
ZenPen = window.ZenPen || {};
ZenPen.ui = (function () {

	// Base elements
	var article, header;

	// Buttons
	var publish;

	function init() {
		bindElements();
		console.log("Checkin under the hood eh? We've probably got a lot in common. You should totally check out StoryZen on github! (https://github.com/brc-dd/storyzen).");
	}

	function bindElements() {
		article = document.querySelector('.content');
		header = document.querySelector('.header');
		header.onkeypress = onHeaderKeyPress;
		publish = document.querySelector('.publish');
		publish.onclick = publishStory;
	}

	function publishStory() {
		console.log("Hey geeky! Just wait we are publishing your story...");
		var headerText = document.querySelector('header.header').innerHTML.replace(/(\r\n|\n|\r)/gm, '').replace(/\t/g, '    ');
		var bodyText = document.querySelector('article.content').innerHTML.replace(/\t/g, '    ');
		var story = { "title": headerText, "content": bodyText };
		var dbParam = JSON.stringify(story);
		// code for IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function () {
			if (this.readyState == 4 && this.status == 200) {
				localStorage.clear();
				window.location.href = this.responseText.replace(/ /g, '+');
			}
		}
		xmlhttp.open("POST", "process.php", false);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send("x=" + dbParam);
	}

	/* Allows the user to press enter to tab from the title */
	function onHeaderKeyPress(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			article.focus();
		}
	}

	return {
		init: init
	}
})();
