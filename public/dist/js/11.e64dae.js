(window.webpackJsonp=window.webpackJsonp||[]).push([[11],{38:function(t,e,n){"use strict";n.r(e);var r=n(0),a=n.n(r),s=n(4),i=n.n(s);function c(t,e,n,r,a,s,i){try{var c=t[s](i),o=c.value}catch(t){return void n(t)}c.done?e(o):Promise.resolve(o).then(r,a)}var o,u,l=function(t){return Object.keys(t).map((function(e){return"".concat(e,"=").concat(t[e])})).join("&")},v={middleware:"guest",metaInfo:function(){return{title:this.$t("verify_email")}},beforeRouteEnter:(o=a.a.mark((function t(e,n,r){var s,c;return a.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,i.a.post("/api/email/verify/".concat(e.params.id,"?").concat(l(e.query)));case 3:s=t.sent,c=s.data,r((function(t){t.success=c.status})),t.next=11;break;case 8:t.prev=8,t.t0=t.catch(0),r((function(e){e.error=t.t0.response.data.status}));case 11:case"end":return t.stop()}}),t,null,[[0,8]])})),u=function(){var t=this,e=arguments;return new Promise((function(n,r){var a=o.apply(t,e);function s(t){c(a,n,r,s,i,"next",t)}function i(t){c(a,n,r,s,i,"throw",t)}s(void 0)}))},function(t,e,n){return u.apply(this,arguments)}),data:function(){return{error:"",success:""}}},f=n(1),d=Object(f.a)(v,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"row"},[n("div",{staticClass:"col-lg-8 m-auto"},[n("card",{attrs:{title:t.$t("verify_email")}},[t.success?[n("div",{staticClass:"alert alert-success",attrs:{role:"alert"}},[t._v("\n          "+t._s(t.success)+"\n        ")]),t._v(" "),n("router-link",{staticClass:"btn btn-primary",attrs:{to:{name:"login"}}},[t._v("\n          "+t._s(t.$t("login"))+"\n        ")])]:[n("div",{staticClass:"alert alert-danger",attrs:{role:"alert"}},[t._v("\n          "+t._s(t.error||t.$t("failed_to_verify_email"))+"\n        ")]),t._v(" "),n("router-link",{staticClass:"small float-right",attrs:{to:{name:"verification.resend"}}},[t._v("\n          "+t._s(t.$t("resend_verification_link"))+"\n        ")])]],2)],1)])}),[],!1,null,null,null);e.default=d.exports}}]);