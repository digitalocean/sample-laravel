import{R as b,r as n}from"./app-8d2b419d.js";import{O as B,U as E,y as R,T as K,o as C,s as A,u as $,d as D,C as T,I as U,a as N}from"./transition-ffe475d1.js";import{I as L,o as j,a as S,r as H}from"./keyboard-55d2b3bd.js";import{T as Z}from"./use-resolve-button-type-81844bc5.js";var M;let Q=(M=b.startTransition)!=null?M:function(e){e()};var V=(e=>(e[e.Open=0]="Open",e[e.Closed=1]="Closed",e))(V||{}),Y=(e=>(e[e.ToggleDisclosure=0]="ToggleDisclosure",e[e.CloseDisclosure=1]="CloseDisclosure",e[e.SetButtonId=2]="SetButtonId",e[e.SetPanelId=3]="SetPanelId",e[e.LinkPanel=4]="LinkPanel",e[e.UnlinkPanel=5]="UnlinkPanel",e))(Y||{});let _={0:e=>({...e,disclosureState:$(e.disclosureState,{0:1,1:0})}),1:e=>e.disclosureState===1?e:{...e,disclosureState:1},4(e){return e.linkedPanel===!0?e:{...e,linkedPanel:!0}},5(e){return e.linkedPanel===!1?e:{...e,linkedPanel:!1}},2(e,t){return e.buttonId===t.buttonId?e:{...e,buttonId:t.buttonId}},3(e,t){return e.panelId===t.panelId?e:{...e,panelId:t.panelId}}},w=n.createContext(null);w.displayName="DisclosureContext";function h(e){let t=n.useContext(w);if(t===null){let a=new Error(`<${e} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(a,h),a}return t}let x=n.createContext(null);x.displayName="DisclosureAPIContext";function F(e){let t=n.useContext(x);if(t===null){let a=new Error(`<${e} /> is missing a parent <Disclosure /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(a,F),a}return t}let O=n.createContext(null);O.displayName="DisclosurePanelContext";function q(){return n.useContext(O)}function z(e,t){return $(t.type,_,e,t)}let G=n.Fragment;function J(e,t){let{defaultOpen:a=!1,...s}=e,m=n.useRef(null),l=R(t,K(i=>{m.current=i},e.as===void 0||e.as===n.Fragment)),r=n.useRef(null),f=n.useRef(null),u=n.useReducer(z,{disclosureState:a?0:1,linkedPanel:!1,buttonRef:f,panelRef:r,buttonId:null,panelId:null}),[{disclosureState:p,buttonId:c},y]=u,d=C(i=>{y({type:1});let v=j(m);if(!v||!c)return;let o=(()=>i?i instanceof HTMLElement?i:i.current instanceof HTMLElement?i.current:v.getElementById(c):v.getElementById(c))();o==null||o.focus()}),I=n.useMemo(()=>({close:d}),[d]),P=n.useMemo(()=>({open:p===0,close:d}),[p,d]),k={ref:l};return b.createElement(w.Provider,{value:u},b.createElement(x.Provider,{value:I},b.createElement(A,{value:$(p,{0:D.Open,1:D.Closed})},T({ourProps:k,theirProps:s,slot:P,defaultTag:G,name:"Disclosure"}))))}let W="button";function X(e,t){let a=L(),{id:s=`headlessui-disclosure-button-${a}`,...m}=e,[l,r]=h("Disclosure.Button"),f=q(),u=f===null?!1:f===l.panelId,p=n.useRef(null),c=R(p,t,u?null:l.buttonRef),y=U();n.useEffect(()=>{if(!u)return r({type:2,buttonId:s}),()=>{r({type:2,buttonId:null})}},[s,r,u]);let d=C(o=>{var g;if(u){if(l.disclosureState===1)return;switch(o.key){case S.Space:case S.Enter:o.preventDefault(),o.stopPropagation(),r({type:0}),(g=l.buttonRef.current)==null||g.focus();break}}else switch(o.key){case S.Space:case S.Enter:o.preventDefault(),o.stopPropagation(),r({type:0});break}}),I=C(o=>{switch(o.key){case S.Space:o.preventDefault();break}}),P=C(o=>{var g;H(o.currentTarget)||e.disabled||(u?(r({type:0}),(g=l.buttonRef.current)==null||g.focus()):r({type:0}))}),k=n.useMemo(()=>({open:l.disclosureState===0}),[l]),i=Z(e,p),v=u?{ref:c,type:i,onKeyDown:d,onClick:P}:{ref:c,id:s,type:i,"aria-expanded":l.disclosureState===0,"aria-controls":l.linkedPanel?l.panelId:void 0,onKeyDown:d,onKeyUp:I,onClick:P};return T({mergeRefs:y,ourProps:v,theirProps:m,slot:k,defaultTag:W,name:"Disclosure.Button"})}let ee="div",te=B.RenderStrategy|B.Static;function ne(e,t){let a=L(),{id:s=`headlessui-disclosure-panel-${a}`,...m}=e,[l,r]=h("Disclosure.Panel"),{close:f}=F("Disclosure.Panel"),u=U(),p=R(t,l.panelRef,P=>{Q(()=>r({type:P?4:5}))});n.useEffect(()=>(r({type:3,panelId:s}),()=>{r({type:3,panelId:null})}),[s,r]);let c=N(),y=(()=>c!==null?(c&D.Open)===D.Open:l.disclosureState===0)(),d=n.useMemo(()=>({open:l.disclosureState===0,close:f}),[l,f]),I={ref:p,id:s};return b.createElement(O.Provider,{value:l.panelId},T({mergeRefs:u,ourProps:I,theirProps:m,slot:d,defaultTag:ee,features:te,visible:y,name:"Disclosure.Panel"}))}let le=E(J),re=E(X),oe=E(ne),pe=Object.assign(le,{Button:re,Panel:oe});function ae({title:e,titleId:t,...a},s){return n.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true","data-slot":"icon",ref:s,"aria-labelledby":t},a),e?n.createElement("title",{id:t},e):null,n.createElement("path",{fillRule:"evenodd",d:"M9.47 6.47a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 1 1-1.06 1.06L10 8.06l-3.72 3.72a.75.75 0 0 1-1.06-1.06l4.25-4.25Z",clipRule:"evenodd"}))}const se=n.forwardRef(ae),fe=se;export{pe as A,fe as C};
