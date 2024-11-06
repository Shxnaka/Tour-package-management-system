$(document).ready(function() {
	var t = $("#vr-check-in"),
		e = $("#vr-check-in-single"),
		i = $("#vr-check-in-time"),
		n = $(" #vr-check-in-filter"),
		r = $("#vr-check-out"),
		l = $("#vr-check-out-single"),
		a = $("#vr-check-out-time"),
		o = $("#vr-check-out-filter"),
		g = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	! function() {
		var i = new Date;
		t.find(".rq-single-date").html(i.getDate()), t.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2)), e.find(".rq-single-date").html(i.getDate()), e.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-date").html(i.getDate()), n.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2))
	}(),
	function() {
		var t = new Date;
		r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2)), l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
	}(), t.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#vr-check-out").val() && $("#vr-check-out").val()
			})
		},
		onChangeDateTime: function() {
			var e = t.datetimepicker("getValue");
			t.find(".rq-single-date").html(e.getDate()), t.find(".rq-single-month").html(g[e.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(e.getFullYear().toString().substr(2, 2))
		}
	}), e.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#vr-check-out-single").val() && $("#vr-check-out-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = e.datetimepicker("getValue");
			e.find(".rq-single-date").html(t.getDate()), e.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), e.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), n.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#vr-check-out-filter").val() && $("#vr-check-out-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = n.datetimepicker("getValue");
			n.find(".rq-single-date").html(t.getDate()), n.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), r.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#vr-check-in").val() && $("#vr-check-in").val()
			})
		},
		onChangeDateTime: function() {
			var t = r.datetimepicker("getValue");
			r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), l.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#vr-check-in-single").val() && $("#vr-check-in-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = l.datetimepicker("getValue");
			l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), l.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), o.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#vr-check-in-filter").val() && $("#vr-check-in-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = o.datetimepicker("getValue");
			o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), a.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = a.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				i = ("0" + t.getMinutes()).slice(-2);
			a.find(".rq-checkout-time").html(e + ":" + i)
		}
	}), i.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = i.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				n = ("0" + t.getMinutes()).slice(-2);
			i.find(".rq-checkin-time").html(e + ":" + n)
		}
	})
}), $(document).ready(function() {
	var t = $("#fl-check-in"),
		e = $("#fl-check-in-single"),
		i = $("#fl-check-in-time"),
		n = $(" #fl-check-in-filter"),
		r = $("#fl-check-out"),
		l = $("#fl-check-out-single"),
		a = $("#fl-check-out-time"),
		o = $("#fl-check-out-filter"),
		g = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	! function() {
		var i = new Date;
		t.find(".rq-single-date").html(i.getDate()), t.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2)), e.find(".rq-single-date").html(i.getDate()), e.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-date").html(i.getDate()), n.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2))
	}(),
	function() {
		var t = new Date;
		r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2)), l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
	}(), t.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#fl-check-out").val() && $("#fl-check-out").val()
			})
		},
		onChangeDateTime: function() {
			var e = t.datetimepicker("getValue");
			t.find(".rq-single-date").html(e.getDate()), t.find(".rq-single-month").html(g[e.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(e.getFullYear().toString().substr(2, 2))
		}
	}), e.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#fl-check-out-single").val() && $("#fl-check-out-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = e.datetimepicker("getValue");
			e.find(".rq-single-date").html(t.getDate()), e.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), e.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), n.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#fl-check-out-filter").val() && $("#fl-check-out-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = n.datetimepicker("getValue");
			n.find(".rq-single-date").html(t.getDate()), n.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), r.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#fl-check-in").val() && $("#fl-check-in").val()
			})
		},
		onChangeDateTime: function() {
			var t = r.datetimepicker("getValue");
			r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), l.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#fl-check-in-single").val() && $("#fl-check-in-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = l.datetimepicker("getValue");
			l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), l.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), o.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#fl-check-in-filter").val() && $("#fl-check-in-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = o.datetimepicker("getValue");
			o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), a.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = a.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				i = ("0" + t.getMinutes()).slice(-2);
			a.find(".rq-checkout-time").html(e + ":" + i)
		}
	}), i.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = i.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				n = ("0" + t.getMinutes()).slice(-2);
			i.find(".rq-checkin-time").html(e + ":" + n)
		}
	})
}), $(document).ready(function() {
	var t = $("#rq-check-in"),
		e = $("#rq-check-in-single"),
		i = $("#rq-check-in-time"),
		n = $(" #rq-check-in-filter"),
		r = $("#rq-check-out"),
		l = $("#rq-check-out-single"),
		a = $("#rq-check-out-time"),
		o = $("#rq-check-out-filter"),
		g = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	! function() {
		var i = new Date;
		t.find(".rq-single-date").html(i.getDate()), t.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2)), e.find(".rq-single-date").html(i.getDate()), e.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-date").html(i.getDate()), n.find(".rq-single-month").html(g[i.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(i.getFullYear().toString().substr(2, 2))
	}(),
	function() {
		var t = new Date;
		r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2)), l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
	}(), t.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#rq-check-out").val() && $("#rq-check-out").val()
			})
		},
		onChangeDateTime: function() {
			var e = t.datetimepicker("getValue");
			t.find(".rq-single-date").html(e.getDate()), t.find(".rq-single-month").html(g[e.getMonth()].toString().substr(0, 3)), t.find(".rq-single-year").html(e.getFullYear().toString().substr(2, 2))
		}
	}), e.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#rq-check-out-single").val() && $("#rq-check-out-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = e.datetimepicker("getValue");
			e.find(".rq-single-date").html(t.getDate()), e.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), e.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), n.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				maxDate: !!$("#rq-check-out-filter").val() && $("#rq-check-out-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = n.datetimepicker("getValue");
			n.find(".rq-single-date").html(t.getDate()), n.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), n.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), r.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#rq-check-in").val() && $("#rq-check-in").val()
			})
		},
		onChangeDateTime: function() {
			var t = r.datetimepicker("getValue");
			r.find(".rq-single-date").html(t.getDate()), r.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), r.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), l.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#rq-check-in-single").val() && $("#rq-check-in-single").val()
			})
		},
		onChangeDateTime: function() {
			var t = l.datetimepicker("getValue");
			l.find(".rq-single-date").html(t.getDate()), l.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), l.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), o.datetimepicker({
		timepicker: !1,
		minDate: 0,
		scrollMonth: !1,
		onShow: function(t) {
			this.setOptions({
				minDate: !!$("#rq-check-in-filter").val() && $("#rq-check-in-filter").val()
			})
		},
		onChangeDateTime: function() {
			var t = o.datetimepicker("getValue");
			o.find(".rq-single-date").html(t.getDate()), o.find(".rq-single-month").html(g[t.getMonth()].toString().substr(0, 3)), o.find(".rq-single-year").html(t.getFullYear().toString().substr(2, 2))
		}
	}), a.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = a.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				i = ("0" + t.getMinutes()).slice(-2);
			a.find(".rq-checkout-time").html(e + ":" + i)
		}
	}), i.datetimepicker({
		timepicker: !0,
		datepicker: !1,
		format: "H:i",
		onChangeDateTime: function() {
			var t = i.datetimepicker("getValue"),
				e = ("0" + t.getHours()).slice(-2),
				n = ("0" + t.getMinutes()).slice(-2);
			i.find(".rq-checkin-time").html(e + ":" + n)
		}
	})
});