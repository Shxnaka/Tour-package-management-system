! function(e) {
	function n(n, i) {
		var s = e.extend({}, e.fn.accordion.defaults, i),
			u = "";
		return n.each(function() {
			var n = e(this);
			o(n, s), "mouseenter" == s.bind && n.bind("mouseenter", function(e) {
				e.preventDefault(), c(n, s)
			}), "mouseover" == s.bind && n.bind("mouseover", function(e) {
				e.preventDefault(), c(n, s)
			}), "click" == s.bind && n.bind("click", function(e) {
				e.preventDefault(), c(n, s)
			}), "dblclick" == s.bind && n.bind("dblclick", function(e) {
				e.preventDefault(), c(n, s)
			}), id = n.attr("id"), t(s) && l(s) ? !1 === a(id, s) ? (n.addClass(s.cssClose), s.loadClose(n, s)) : (n.addClass(s.cssOpen), s.loadOpen(n, s), u = id) : id != s.defaultOpen ? (n.addClass(s.cssClose), s.loadClose(n, s)) : (n.addClass(s.cssOpen), s.loadOpen(n, s), u = id)
		}), u.length > 0 && t(s) ? d(u, s) : d("", s), n
	}

	function o(e, n) {
		return e.data("accordion-opts", n)
	}

	function i(n) {
		opened = e(document).find("." + n.cssOpen), e.each(opened, function() {
			e(this).addClass(n.cssClose).removeClass(n.cssOpen), n.animateClose(e(this), n)
		})
	}

	function s(e, n) {
		i(n), e.removeClass(n.cssClose).addClass(n.cssOpen), n.animateOpen(e, n), t(n) && (id = e.attr("id"), d(id, n))
	}

	function c(e, n) {
		return e.hasClass(n.cssOpen) ? (i(n), t(n) && d("", n), !1) : (i(n), s(e, n), !1)
	}

	function t(n) {
		return !(!e.cookie || "" == n.cookieName)
	}

	function d(n, o) {
		if (!t(o)) return !1;
		e.cookie(o.cookieName, n, o.cookieOptions)
	}

	function a(n, o) {
		return !!t(o) && (!!l(o) && (cookie = unescape(e.cookie(o.cookieName)), cookie == n))
	}

	function l(n) {
		return !!t(n) && null != e.cookie(n.cookieName)
	}
	e.fn.accordion = function(e) {
		if (!this || this.length < 1) return this;
		n(this, e)
	}, e.fn.accordion.defaults = {
		cssClose: "accordion-close",
		cssOpen: "accordion-open",
		cookieName: "accordion",
		cookieOptions: {
			path: "/",
			expires: 7,
			domain: "",
			secure: ""
		},
		defaultOpen: "",
		speed: "slow",
		bind: "click",
		animateOpen: function(e, n) {
			e.next().stop(!0, !0).slideDown(n.speed)
		},
		animateClose: function(e, n) {
			e.next().stop(!0, !0).slideUp(n.speed)
		},
		loadOpen: function(e, n) {
			e.next().show()
		},
		loadClose: function(e, n) {
			e.next().hide()
		}
	}
}(jQuery);