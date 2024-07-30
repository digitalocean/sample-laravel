import{r as d,R as L}from"./app-44e6087d.js";import{s as V,d as E,p as K,u as W}from"./transition-6816727b.js";import{l as T,O as U,U as k,y as D,o as I,u as B,C as $,a as A}from"./use-is-mounted-060cb39a.js";import{o as j,I as O,h as G,T as H,a as m,_ as J,M as Q,D as q,b as z}from"./keyboard-12cbf972.js";import{y as X,r as Y}from"./bugs-0c7cdab9.js";import{n as Z}from"./use-owner-13333598.js";import{T as ee}from"./use-resolve-button-type-b263c67a.js";import{s as te,u as re,c as R,f as ne}from"./use-text-value-6acd58e4.js";function ae({container:e,accept:i,walk:o,enabled:n=!0}){let a=d.useRef(i),s=d.useRef(o);d.useEffect(()=>{a.current=i,s.current=o},[i,o]),T(()=>{if(!e||!n)return;let u=j(e);if(!u)return;let t=a.current,l=s.current,p=Object.assign(g=>t(g),{acceptNode:t}),v=u.createTreeWalker(e,NodeFilter.SHOW_ELEMENT,p,!1);for(;v.nextNode();)l(v.currentNode)},[e,n,a,s])}var oe=(e=>(e[e.Open=0]="Open",e[e.Closed=1]="Closed",e))(oe||{}),ue=(e=>(e[e.Pointer=0]="Pointer",e[e.Other=1]="Other",e))(ue||{}),ie=(e=>(e[e.OpenMenu=0]="OpenMenu",e[e.CloseMenu=1]="CloseMenu",e[e.GoToItem=2]="GoToItem",e[e.Search=3]="Search",e[e.ClearSearch=4]="ClearSearch",e[e.RegisterItem=5]="RegisterItem",e[e.UnregisterItem=6]="UnregisterItem",e))(ie||{});function F(e,i=o=>o){let o=e.activeItemIndex!==null?e.items[e.activeItemIndex]:null,n=z(i(e.items.slice()),s=>s.dataRef.current.domRef.current),a=o?n.indexOf(o):null;return a===-1&&(a=null),{items:n,activeItemIndex:a}}let se={1(e){return e.menuState===1?e:{...e,activeItemIndex:null,menuState:1}},0(e){return e.menuState===0?e:{...e,__demoMode:!1,menuState:0}},2:(e,i)=>{var o;let n=F(e),a=ne(i,{resolveItems:()=>n.items,resolveActiveIndex:()=>n.activeItemIndex,resolveId:s=>s.id,resolveDisabled:s=>s.dataRef.current.disabled});return{...e,...n,searchQuery:"",activeItemIndex:a,activationTrigger:(o=i.trigger)!=null?o:1}},3:(e,i)=>{let o=e.searchQuery!==""?0:1,n=e.searchQuery+i.value.toLowerCase(),a=(e.activeItemIndex!==null?e.items.slice(e.activeItemIndex+o).concat(e.items.slice(0,e.activeItemIndex+o)):e.items).find(u=>{var t;return((t=u.dataRef.current.textValue)==null?void 0:t.startsWith(n))&&!u.dataRef.current.disabled}),s=a?e.items.indexOf(a):-1;return s===-1||s===e.activeItemIndex?{...e,searchQuery:n}:{...e,searchQuery:n,activeItemIndex:s,activationTrigger:1}},4(e){return e.searchQuery===""?e:{...e,searchQuery:"",searchActiveItemIndex:null}},5:(e,i)=>{let o=F(e,n=>[...n,{id:i.id,dataRef:i.dataRef}]);return{...e,...o}},6:(e,i)=>{let o=F(e,n=>{let a=n.findIndex(s=>s.id===i.id);return a!==-1&&n.splice(a,1),n});return{...e,...o,activationTrigger:1}}},_=d.createContext(null);_.displayName="MenuContext";function w(e){let i=d.useContext(_);if(i===null){let o=new Error(`<${e} /> is missing a parent <Menu /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(o,w),o}return i}function le(e,i){return B(i.type,se,e,i)}let ce=d.Fragment;function de(e,i){let{__demoMode:o=!1,...n}=e,a=d.useReducer(le,{__demoMode:o,menuState:o?0:1,buttonRef:d.createRef(),itemsRef:d.createRef(),items:[],searchQuery:"",activeItemIndex:null,activationTrigger:1}),[{menuState:s,itemsRef:u,buttonRef:t},l]=a,p=D(i);X([t,u],(b,S)=>{var c;l({type:1}),G(S,H.Loose)||(b.preventDefault(),(c=t.current)==null||c.focus())},s===0);let v=I(()=>{l({type:1})}),g=d.useMemo(()=>({open:s===0,close:v}),[s,v]),y={ref:p};return L.createElement(_.Provider,{value:a},L.createElement(V,{value:B(s,{0:E.Open,1:E.Closed})},$({ourProps:y,theirProps:n,slot:g,defaultTag:ce,name:"Menu"})))}let me="button";function pe(e,i){var o;let n=O(),{id:a=`headlessui-menu-button-${n}`,...s}=e,[u,t]=w("Menu.Button"),l=D(u.buttonRef,i),p=K(),v=I(c=>{switch(c.key){case m.Space:case m.Enter:case m.ArrowDown:c.preventDefault(),c.stopPropagation(),t({type:0}),p.nextFrame(()=>t({type:2,focus:R.First}));break;case m.ArrowUp:c.preventDefault(),c.stopPropagation(),t({type:0}),p.nextFrame(()=>t({type:2,focus:R.Last}));break}}),g=I(c=>{switch(c.key){case m.Space:c.preventDefault();break}}),y=I(c=>{if(Y(c.currentTarget))return c.preventDefault();e.disabled||(u.menuState===0?(t({type:1}),p.nextFrame(()=>{var x;return(x=u.buttonRef.current)==null?void 0:x.focus({preventScroll:!0})})):(c.preventDefault(),t({type:0})))}),b=d.useMemo(()=>({open:u.menuState===0}),[u]),S={ref:l,id:a,type:ee(e,u.buttonRef),"aria-haspopup":"menu","aria-controls":(o=u.itemsRef.current)==null?void 0:o.id,"aria-expanded":u.menuState===0,onKeyDown:v,onKeyUp:g,onClick:y};return $({ourProps:S,theirProps:s,slot:b,defaultTag:me,name:"Menu.Button"})}let fe="div",ve=U.RenderStrategy|U.Static;function Ie(e,i){var o,n;let a=O(),{id:s=`headlessui-menu-items-${a}`,...u}=e,[t,l]=w("Menu.Items"),p=D(t.itemsRef,i),v=Z(t.itemsRef),g=K(),y=W(),b=(()=>y!==null?(y&E.Open)===E.Open:t.menuState===0)();d.useEffect(()=>{let r=t.itemsRef.current;r&&t.menuState===0&&r!==(v==null?void 0:v.activeElement)&&r.focus({preventScroll:!0})},[t.menuState,t.itemsRef,v]),ae({container:t.itemsRef.current,enabled:t.menuState===0,accept(r){return r.getAttribute("role")==="menuitem"?NodeFilter.FILTER_REJECT:r.hasAttribute("role")?NodeFilter.FILTER_SKIP:NodeFilter.FILTER_ACCEPT},walk(r){r.setAttribute("role","none")}});let S=I(r=>{var h,P;switch(g.dispose(),r.key){case m.Space:if(t.searchQuery!=="")return r.preventDefault(),r.stopPropagation(),l({type:3,value:r.key});case m.Enter:if(r.preventDefault(),r.stopPropagation(),l({type:1}),t.activeItemIndex!==null){let{dataRef:f}=t.items[t.activeItemIndex];(P=(h=f.current)==null?void 0:h.domRef.current)==null||P.click()}q(t.buttonRef.current);break;case m.ArrowDown:return r.preventDefault(),r.stopPropagation(),l({type:2,focus:R.Next});case m.ArrowUp:return r.preventDefault(),r.stopPropagation(),l({type:2,focus:R.Previous});case m.Home:case m.PageUp:return r.preventDefault(),r.stopPropagation(),l({type:2,focus:R.First});case m.End:case m.PageDown:return r.preventDefault(),r.stopPropagation(),l({type:2,focus:R.Last});case m.Escape:r.preventDefault(),r.stopPropagation(),l({type:1}),A().nextFrame(()=>{var f;return(f=t.buttonRef.current)==null?void 0:f.focus({preventScroll:!0})});break;case m.Tab:r.preventDefault(),r.stopPropagation(),l({type:1}),A().nextFrame(()=>{J(t.buttonRef.current,r.shiftKey?Q.Previous:Q.Next)});break;default:r.key.length===1&&(l({type:3,value:r.key}),g.setTimeout(()=>l({type:4}),350));break}}),c=I(r=>{switch(r.key){case m.Space:r.preventDefault();break}}),x=d.useMemo(()=>({open:t.menuState===0}),[t]),M={"aria-activedescendant":t.activeItemIndex===null||(o=t.items[t.activeItemIndex])==null?void 0:o.id,"aria-labelledby":(n=t.buttonRef.current)==null?void 0:n.id,id:s,onKeyDown:S,onKeyUp:c,role:"menu",tabIndex:0,ref:p};return $({ourProps:M,theirProps:u,slot:x,defaultTag:fe,features:ve,visible:b,name:"Menu.Items"})}let ye=d.Fragment;function ge(e,i){let o=O(),{id:n=`headlessui-menu-item-${o}`,disabled:a=!1,...s}=e,[u,t]=w("Menu.Item"),l=u.activeItemIndex!==null?u.items[u.activeItemIndex].id===n:!1,p=d.useRef(null),v=D(i,p);T(()=>{if(u.__demoMode||u.menuState!==0||!l||u.activationTrigger===0)return;let f=A();return f.requestAnimationFrame(()=>{var C,N;(N=(C=p.current)==null?void 0:C.scrollIntoView)==null||N.call(C,{block:"nearest"})}),f.dispose},[u.__demoMode,p,l,u.menuState,u.activationTrigger,u.activeItemIndex]);let g=te(p),y=d.useRef({disabled:a,domRef:p,get textValue(){return g()}});T(()=>{y.current.disabled=a},[y,a]),T(()=>(t({type:5,id:n,dataRef:y}),()=>t({type:6,id:n})),[y,n]);let b=I(()=>{t({type:1})}),S=I(f=>{if(a)return f.preventDefault();t({type:1}),q(u.buttonRef.current)}),c=I(()=>{if(a)return t({type:2,focus:R.Nothing});t({type:2,focus:R.Specific,id:n})}),x=re(),M=I(f=>x.update(f)),r=I(f=>{x.wasMoved(f)&&(a||l||t({type:2,focus:R.Specific,id:n,trigger:0}))}),h=I(f=>{x.wasMoved(f)&&(a||l&&t({type:2,focus:R.Nothing}))}),P=d.useMemo(()=>({active:l,disabled:a,close:b}),[l,a,b]);return $({ourProps:{id:n,ref:v,role:"menuitem",tabIndex:a===!0?void 0:-1,"aria-disabled":a===!0?!0:void 0,disabled:void 0,onClick:S,onFocus:c,onPointerEnter:M,onMouseEnter:M,onPointerMove:r,onMouseMove:r,onPointerLeave:h,onMouseLeave:h},theirProps:s,slot:P,defaultTag:ye,name:"Menu.Item"})}let Re=k(de),be=k(pe),xe=k(Ie),Se=k(ge),we=Object.assign(Re,{Button:be,Items:xe,Item:Se});export{we as q};
