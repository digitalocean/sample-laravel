import{r as u,R as A}from"./app-44e6087d.js";import{I as X,b as D,N as U,o as te,a as T,O as R,M as I}from"./keyboard-12cbf972.js";import{f as re,O as K,U as L,y as M,s as G,o as w,l as B,C as _,u as F,c as ne}from"./use-is-mounted-060cb39a.js";import{T as ae}from"./use-resolve-button-type-b263c67a.js";import{f as J,s as le}from"./hidden-5f7c5d87.js";function se({onFocus:e}){let[t,r]=u.useState(!0),n=re();return t?A.createElement(J,{as:"button",type:"button",features:le.Focusable,onFocus:s=>{s.preventDefault();let a,o=50;function b(){if(o--<=0){a&&cancelAnimationFrame(a);return}if(e()){if(cancelAnimationFrame(a),!n.current)return;r(!1);return}a=requestAnimationFrame(b)}a=requestAnimationFrame(b)}}):null}const Q=u.createContext(null);function ue(){return{groups:new Map,get(e,t){var r;let n=this.groups.get(e);n||(n=new Map,this.groups.set(e,n));let s=(r=n.get(t))!=null?r:0;n.set(t,s+1);let a=Array.from(n.keys()).indexOf(t);function o(){let b=n.get(t);b>1?n.set(t,b-1):n.delete(t)}return[a,o]}}}function oe({children:e}){let t=u.useRef(ue());return u.createElement(Q.Provider,{value:t},e)}function V(e){let t=u.useContext(Q);if(!t)throw new Error("You must wrap your component in a <StableCollection>");let r=ie(),[n,s]=t.current.get(e,r);return u.useEffect(()=>s,[]),n}function ie(){var e,t,r;let n=(r=(t=(e=u.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED)==null?void 0:e.ReactCurrentOwner)==null?void 0:t.current)!=null?r:null;if(!n)return Symbol();let s=[],a=n;for(;a;)s.push(a.index),a=a.return;return"$."+s.join(".")}var ce=(e=>(e[e.Forwards=0]="Forwards",e[e.Backwards=1]="Backwards",e))(ce||{}),de=(e=>(e[e.Less=-1]="Less",e[e.Equal=0]="Equal",e[e.Greater=1]="Greater",e))(de||{}),fe=(e=>(e[e.SetSelectedIndex=0]="SetSelectedIndex",e[e.RegisterTab=1]="RegisterTab",e[e.UnregisterTab=2]="UnregisterTab",e[e.RegisterPanel=3]="RegisterPanel",e[e.UnregisterPanel=4]="UnregisterPanel",e))(fe||{});let pe={0(e,t){var r;let n=D(e.tabs,c=>c.current),s=D(e.panels,c=>c.current),a=n.filter(c=>{var g;return!((g=c.current)!=null&&g.hasAttribute("disabled"))}),o={...e,tabs:n,panels:s};if(t.index<0||t.index>n.length-1){let c=F(Math.sign(t.index-e.selectedIndex),{[-1]:()=>1,0:()=>F(Math.sign(t.index),{[-1]:()=>0,0:()=>0,1:()=>1}),1:()=>0});if(a.length===0)return o;let g=F(c,{0:()=>n.indexOf(a[0]),1:()=>n.indexOf(a[a.length-1])});return{...o,selectedIndex:g===-1?e.selectedIndex:g}}let b=n.slice(0,t.index),h=[...n.slice(t.index),...b].find(c=>a.includes(c));if(!h)return o;let x=(r=n.indexOf(h))!=null?r:e.selectedIndex;return x===-1&&(x=e.selectedIndex),{...o,selectedIndex:x}},1(e,t){var r;if(e.tabs.includes(t.tab))return e;let n=e.tabs[e.selectedIndex],s=D([...e.tabs,t.tab],o=>o.current),a=(r=s.indexOf(n))!=null?r:e.selectedIndex;return a===-1&&(a=e.selectedIndex),{...e,tabs:s,selectedIndex:a}},2(e,t){return{...e,tabs:e.tabs.filter(r=>r!==t.tab)}},3(e,t){return e.panels.includes(t.panel)?e:{...e,panels:D([...e.panels,t.panel],r=>r.current)}},4(e,t){return{...e,panels:e.panels.filter(r=>r!==t.panel)}}},j=u.createContext(null);j.displayName="TabsDataContext";function O(e){let t=u.useContext(j);if(t===null){let r=new Error(`<${e} /> is missing a parent <Tab.Group /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,O),r}return t}let z=u.createContext(null);z.displayName="TabsActionsContext";function Y(e){let t=u.useContext(z);if(t===null){let r=new Error(`<${e} /> is missing a parent <Tab.Group /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,Y),r}return t}function be(e,t){return F(t.type,pe,e,t)}let xe=u.Fragment;function me(e,t){let{defaultIndex:r=0,vertical:n=!1,manual:s=!1,onChange:a,selectedIndex:o=null,...b}=e;const h=n?"vertical":"horizontal",x=s?"manual":"auto";let c=o!==null,g=M(t),[i,v]=u.useReducer(be,{selectedIndex:o??r,tabs:[],panels:[]}),f=u.useMemo(()=>({selectedIndex:i.selectedIndex}),[i.selectedIndex]),C=G(a||(()=>{})),k=G(i.tabs),p=u.useMemo(()=>({orientation:h,activation:x,...i}),[h,x,i]),m=w(d=>(v({type:1,tab:d}),()=>v({type:2,tab:d}))),$=w(d=>(v({type:3,panel:d}),()=>v({type:4,panel:d}))),y=w(d=>{S.current!==d&&C.current(d),c||v({type:0,index:d})}),S=G(c?e.selectedIndex:i.selectedIndex),W=u.useMemo(()=>({registerTab:m,registerPanel:$,change:y}),[]);B(()=>{v({type:0,index:o??r})},[o]),B(()=>{if(S.current===void 0||i.tabs.length<=0)return;let d=D(i.tabs,E=>E.current);d.some((E,l)=>i.tabs[l]!==E)&&y(d.indexOf(i.tabs[S.current]))});let q={ref:g};return A.createElement(oe,null,A.createElement(z.Provider,{value:W},A.createElement(j.Provider,{value:p},p.tabs.length<=0&&A.createElement(se,{onFocus:()=>{var d,E;for(let l of k.current)if(((d=l.current)==null?void 0:d.tabIndex)===0)return(E=l.current)==null||E.focus(),!0;return!1}}),_({ourProps:q,theirProps:b,slot:f,defaultTag:xe,name:"Tabs"}))))}let ge="div";function ve(e,t){let{orientation:r,selectedIndex:n}=O("Tab.List"),s=M(t);return _({ourProps:{ref:s,role:"tablist","aria-orientation":r},theirProps:e,slot:{selectedIndex:n},defaultTag:ge,name:"Tabs.List"})}let Te="button";function Ie(e,t){var r,n;let s=X(),{id:a=`headlessui-tabs-tab-${s}`,...o}=e,{orientation:b,activation:h,selectedIndex:x,tabs:c,panels:g}=O("Tab"),i=Y("Tab"),v=O("Tab"),f=u.useRef(null),C=M(f,t);B(()=>i.registerTab(f),[i,f]);let k=V("tabs"),p=c.indexOf(f);p===-1&&(p=k);let m=p===x,$=w(l=>{var P;let N=l();if(N===U.Success&&h==="auto"){let Z=(P=te(f))==null?void 0:P.activeElement,H=v.tabs.findIndex(ee=>ee.current===Z);H!==-1&&i.change(H)}return N}),y=w(l=>{let P=c.map(N=>N.current).filter(Boolean);if(l.key===T.Space||l.key===T.Enter){l.preventDefault(),l.stopPropagation(),i.change(p);return}switch(l.key){case T.Home:case T.PageUp:return l.preventDefault(),l.stopPropagation(),$(()=>R(P,I.First));case T.End:case T.PageDown:return l.preventDefault(),l.stopPropagation(),$(()=>R(P,I.Last))}if($(()=>F(b,{vertical(){return l.key===T.ArrowUp?R(P,I.Previous|I.WrapAround):l.key===T.ArrowDown?R(P,I.Next|I.WrapAround):U.Error},horizontal(){return l.key===T.ArrowLeft?R(P,I.Previous|I.WrapAround):l.key===T.ArrowRight?R(P,I.Next|I.WrapAround):U.Error}}))===U.Success)return l.preventDefault()}),S=u.useRef(!1),W=w(()=>{var l;S.current||(S.current=!0,(l=f.current)==null||l.focus({preventScroll:!0}),i.change(p),ne(()=>{S.current=!1}))}),q=w(l=>{l.preventDefault()}),d=u.useMemo(()=>({selected:m}),[m]),E={ref:C,onKeyDown:y,onMouseDown:q,onClick:W,id:a,role:"tab",type:ae(e,f),"aria-controls":(n=(r=g[p])==null?void 0:r.current)==null?void 0:n.id,"aria-selected":m,tabIndex:m?0:-1};return _({ourProps:E,theirProps:o,slot:d,defaultTag:Te,name:"Tabs.Tab"})}let he="div";function Pe(e,t){let{selectedIndex:r}=O("Tab.Panels"),n=M(t),s=u.useMemo(()=>({selectedIndex:r}),[r]);return _({ourProps:{ref:n},theirProps:e,slot:s,defaultTag:he,name:"Tabs.Panels"})}let Ee="div",$e=K.RenderStrategy|K.Static;function ye(e,t){var r,n,s,a;let o=X(),{id:b=`headlessui-tabs-panel-${o}`,tabIndex:h=0,...x}=e,{selectedIndex:c,tabs:g,panels:i}=O("Tab.Panel"),v=Y("Tab.Panel"),f=u.useRef(null),C=M(f,t);B(()=>v.registerPanel(f),[v,f]);let k=V("panels"),p=i.indexOf(f);p===-1&&(p=k);let m=p===c,$=u.useMemo(()=>({selected:m}),[m]),y={ref:C,id:b,role:"tabpanel","aria-labelledby":(n=(r=g[p])==null?void 0:r.current)==null?void 0:n.id,tabIndex:m?h:-1};return!m&&((s=x.unmount)==null||s)&&!((a=x.static)!=null&&a)?A.createElement(J,{as:"span","aria-hidden":"true",...y}):_({ourProps:y,theirProps:x,slot:$,defaultTag:Ee,features:$e,visible:m,name:"Tabs.Panel"})}let Se=L(Ie),we=L(me),Re=L(ve),Ae=L(Pe),Oe=L(ye),Me=Object.assign(Se,{Group:we,List:Re,Panels:Ae,Panel:Oe});export{Me as $};
