import{r as o}from"./app-8d2b419d.js";import{o as c}from"./transition-ffe475d1.js";let a=/([\u2700-\u27BF]|[\uE000-\uF8FF]|\uD83C[\uDC00-\uDFFF]|\uD83D[\uDC00-\uDFFF]|[\u2011-\u26FF]|\uD83E[\uDD10-\uDDFF])/g;function f(r){var n,u;let e=(n=r.innerText)!=null?n:"",l=r.cloneNode(!0);if(!(l instanceof HTMLElement))return e;let t=!1;for(let m of l.querySelectorAll('[hidden],[aria-hidden],[role="img"]'))m.remove(),t=!0;let i=t?(u=l.innerText)!=null?u:"":e;return a.test(i)&&(i=i.replace(a,"")),i}function F(r){let n=r.getAttribute("aria-label");if(typeof n=="string")return n.trim();let u=r.getAttribute("aria-labelledby");if(u){let e=u.split(" ").map(l=>{let t=document.getElementById(l);if(t){let i=t.getAttribute("aria-label");return typeof i=="string"?i.trim():f(t).trim()}return null}).filter(Boolean);if(e.length>0)return e.join(", ")}return f(r).trim()}function g(r){let n=o.useRef(""),u=o.useRef("");return c(()=>{let e=r.current;if(!e)return"";let l=e.innerText;if(n.current===l)return u.current;let t=F(e).trim().toLowerCase();return n.current=l,u.current=t,t})}export{g as s};
