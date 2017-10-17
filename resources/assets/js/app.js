
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



Vue.component('question', require('./components/Question.vue'));

import VueCoreImageUpload from 'vue-core-image-upload';

const app = new Vue({
    el: '#app',

     components: {
    'vue-core-image-upload': VueCoreImageUpload,
	  },
	  data() {
	    return {
	      src: 'http://img1.vued.vanthink.cn/vued0a233185b6027244f9d43e653227439a.png',
	    }
	  },
	  methods: {
	    imageuploaded(res) {
	    	console.log(res);
	        insertAtCaret('![alt text]('+ res.src + ' "Image Title")');
	      
	    },

	    openWiki(id)
	    {
	    	console.log(window.location);
	    	window.location = '/wiki/' + id;
	    }
	  }
    
});



function insertAtCaret(text) {
	    
	    var areaId = 'marked-mathjax-input';
		var txtarea = document.getElementById(areaId);
		if (!txtarea) { return; }

		var scrollPos = txtarea.scrollTop;
		var strPos = 0;
		var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
			"ff" : (document.selection ? "ie" : false ) );
		if (br == "ie") {
			txtarea.focus();
			var range = document.selection.createRange();
			range.moveStart ('character', -txtarea.value.length);
			strPos = range.text.length;
		} else if (br == "ff") {
			strPos = txtarea.selectionStart;
		}

		var front = (txtarea.value).substring(0, strPos);
		var back = (txtarea.value).substring(strPos, txtarea.value.length);
		txtarea.value = front + text + back;
		strPos = strPos + text.length;
		if (br == "ie") {
			txtarea.focus();
			var ieRange = document.selection.createRange();
			ieRange.moveStart ('character', -txtarea.value.length);
			ieRange.moveStart ('character', strPos);
			ieRange.moveEnd ('character', 0);
			ieRange.select();
		} else if (br == "ff") {
			txtarea.selectionStart = strPos;
			txtarea.selectionEnd = strPos;
			txtarea.focus();
		}

		txtarea.scrollTop = scrollPos;
} 	

