import{r as i,R,W as oe,j as t,a as ie,d as Z}from"./app-c6eb9c27.js";import{G as ue}from"./GuestLayout-3a897a5e.js";import{I as j}from"./InputError-11f229f7.js";import{I as N}from"./InputLabel-d2a59604.js";import{P as ce}from"./PrimaryButton-0690a387.js";import{T as y}from"./TextInput-5f3bfe8b.js";import{f as te,s as de,I as ae,a as O,N as W,o as me,b as _,O as F,M as I}from"./keyboard-7e6d477f.js";import{f as xe,O as ee,U as M,y as G,s as K,o as $,l as z,C as U,u as q,t as pe}from"./use-is-mounted-61ea4c08.js";import{T as fe}from"./use-resolve-button-type-ad2383b9.js";function ge({onFocus:e}){let[a,r]=i.useState(!0),n=xe();return a?R.createElement(te,{as:"button",type:"button",features:de.Focusable,onFocus:l=>{l.preventDefault();let o,c=50;function p(){if(c--<=0){o&&cancelAnimationFrame(o);return}if(e()){if(cancelAnimationFrame(o),!n.current)return;r(!1);return}o=requestAnimationFrame(p)}o=requestAnimationFrame(p)}}):null}const re=i.createContext(null);function he(){return{groups:new Map,get(e,a){var r;let n=this.groups.get(e);n||(n=new Map,this.groups.set(e,n));let l=(r=n.get(a))!=null?r:0;n.set(a,l+1);let o=Array.from(n.keys()).indexOf(a);function c(){let p=n.get(a);p>1?n.set(a,p-1):n.delete(a)}return[o,c]}}}function be({children:e}){let a=i.useRef(he());return i.createElement(re.Provider,{value:a},e)}function ne(e){let a=i.useContext(re);if(!a)throw new Error("You must wrap your component in a <StableCollection>");let r=ve(),[n,l]=a.current.get(e,r);return i.useEffect(()=>l,[]),n}function ve(){var e,a,r;let n=(r=(a=(e=i.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED)==null?void 0:e.ReactCurrentOwner)==null?void 0:a.current)!=null?r:null;if(!n)return Symbol();let l=[],o=n;for(;o;)l.push(o.index),o=o.return;return"$."+l.join(".")}var we=(e=>(e[e.Forwards=0]="Forwards",e[e.Backwards=1]="Backwards",e))(we||{}),je=(e=>(e[e.Less=-1]="Less",e[e.Equal=0]="Equal",e[e.Greater=1]="Greater",e))(je||{}),Ne=(e=>(e[e.SetSelectedIndex=0]="SetSelectedIndex",e[e.RegisterTab=1]="RegisterTab",e[e.UnregisterTab=2]="UnregisterTab",e[e.RegisterPanel=3]="RegisterPanel",e[e.UnregisterPanel=4]="UnregisterPanel",e))(Ne||{});let ye={0(e,a){var r;let n=O(e.tabs,m=>m.current),l=O(e.panels,m=>m.current),o=n.filter(m=>{var v;return!((v=m.current)!=null&&v.hasAttribute("disabled"))}),c={...e,tabs:n,panels:l};if(a.index<0||a.index>n.length-1){let m=q(Math.sign(a.index-e.selectedIndex),{[-1]:()=>1,0:()=>q(Math.sign(a.index),{[-1]:()=>0,0:()=>0,1:()=>1}),1:()=>0});if(o.length===0)return c;let v=q(m,{0:()=>n.indexOf(o[0]),1:()=>n.indexOf(o[o.length-1])});return{...c,selectedIndex:v===-1?e.selectedIndex:v}}let p=n.slice(0,a.index),b=[...n.slice(a.index),...p].find(m=>o.includes(m));if(!b)return c;let s=(r=n.indexOf(b))!=null?r:e.selectedIndex;return s===-1&&(s=e.selectedIndex),{...c,selectedIndex:s}},1(e,a){var r;if(e.tabs.includes(a.tab))return e;let n=e.tabs[e.selectedIndex],l=O([...e.tabs,a.tab],c=>c.current),o=(r=l.indexOf(n))!=null?r:e.selectedIndex;return o===-1&&(o=e.selectedIndex),{...e,tabs:l,selectedIndex:o}},2(e,a){return{...e,tabs:e.tabs.filter(r=>r!==a.tab)}},3(e,a){return e.panels.includes(a.panel)?e:{...e,panels:O([...e.panels,a.panel],r=>r.current)}},4(e,a){return{...e,panels:e.panels.filter(r=>r!==a.panel)}}},X=i.createContext(null);X.displayName="TabsDataContext";function A(e){let a=i.useContext(X);if(a===null){let r=new Error(`<${e} /> is missing a parent <Tab.Group /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,A),r}return a}let J=i.createContext(null);J.displayName="TabsActionsContext";function Q(e){let a=i.useContext(J);if(a===null){let r=new Error(`<${e} /> is missing a parent <Tab.Group /> component.`);throw Error.captureStackTrace&&Error.captureStackTrace(r,Q),r}return a}function _e(e,a){return q(a.type,ye,e,a)}let Ie=i.Fragment;function Pe(e,a){let{defaultIndex:r=0,vertical:n=!1,manual:l=!1,onChange:o,selectedIndex:c=null,...p}=e;const b=n?"vertical":"horizontal",s=l?"manual":"auto";let m=c!==null,v=G(a),[d,w]=i.useReducer(_e,{selectedIndex:c??r,tabs:[],panels:[]}),f=i.useMemo(()=>({selectedIndex:d.selectedIndex}),[d.selectedIndex]),D=K(o||(()=>{})),L=K(d.tabs),g=i.useMemo(()=>({orientation:b,activation:s,...d}),[b,s,d]),h=$(x=>(w({type:1,tab:x}),()=>w({type:2,tab:x}))),C=$(x=>(w({type:3,panel:x}),()=>w({type:4,panel:x}))),S=$(x=>{k.current!==x&&D.current(x),m||w({type:0,index:x})}),k=K(m?e.selectedIndex:d.selectedIndex),Y=i.useMemo(()=>({registerTab:h,registerPanel:C,change:S}),[]);z(()=>{w({type:0,index:c??r})},[c]),z(()=>{if(k.current===void 0||d.tabs.length<=0)return;let x=O(d.tabs,E=>E.current);x.some((E,u)=>d.tabs[u]!==E)&&S(x.indexOf(d.tabs[k.current]))});let H={ref:v};return R.createElement(be,null,R.createElement(J.Provider,{value:Y},R.createElement(X.Provider,{value:g},g.tabs.length<=0&&R.createElement(ge,{onFocus:()=>{var x,E;for(let u of L.current)if(((x=u.current)==null?void 0:x.tabIndex)===0)return(E=u.current)==null||E.focus(),!0;return!1}}),U({ourProps:H,theirProps:p,slot:f,defaultTag:Ie,name:"Tabs"}))))}let Te="div";function Ee(e,a){let{orientation:r,selectedIndex:n}=A("Tab.List"),l=G(a);return U({ourProps:{ref:l,role:"tablist","aria-orientation":r},theirProps:e,slot:{selectedIndex:n},defaultTag:Te,name:"Tabs.List"})}let Ce="button";function Se(e,a){var r,n;let l=ae(),{id:o=`headlessui-tabs-tab-${l}`,...c}=e,{orientation:p,activation:b,selectedIndex:s,tabs:m,panels:v}=A("Tab"),d=Q("Tab"),w=A("Tab"),f=i.useRef(null),D=G(f,a);z(()=>d.registerTab(f),[d,f]);let L=ne("tabs"),g=m.indexOf(f);g===-1&&(g=L);let h=g===s,C=$(u=>{var P;let B=u();if(B===W.Success&&b==="auto"){let se=(P=me(f))==null?void 0:P.activeElement,V=w.tabs.findIndex(le=>le.current===se);V!==-1&&d.change(V)}return B}),S=$(u=>{let P=m.map(B=>B.current).filter(Boolean);if(u.key===_.Space||u.key===_.Enter){u.preventDefault(),u.stopPropagation(),d.change(g);return}switch(u.key){case _.Home:case _.PageUp:return u.preventDefault(),u.stopPropagation(),C(()=>F(P,I.First));case _.End:case _.PageDown:return u.preventDefault(),u.stopPropagation(),C(()=>F(P,I.Last))}if(C(()=>q(p,{vertical(){return u.key===_.ArrowUp?F(P,I.Previous|I.WrapAround):u.key===_.ArrowDown?F(P,I.Next|I.WrapAround):W.Error},horizontal(){return u.key===_.ArrowLeft?F(P,I.Previous|I.WrapAround):u.key===_.ArrowRight?F(P,I.Next|I.WrapAround):W.Error}}))===W.Success)return u.preventDefault()}),k=i.useRef(!1),Y=$(()=>{var u;k.current||(k.current=!0,(u=f.current)==null||u.focus({preventScroll:!0}),d.change(g),pe(()=>{k.current=!1}))}),H=$(u=>{u.preventDefault()}),x=i.useMemo(()=>({selected:h}),[h]),E={ref:D,onKeyDown:S,onMouseDown:H,onClick:Y,id:o,role:"tab",type:fe(e,f),"aria-controls":(n=(r=v[g])==null?void 0:r.current)==null?void 0:n.id,"aria-selected":h,tabIndex:h?0:-1};return U({ourProps:E,theirProps:c,slot:x,defaultTag:Ce,name:"Tabs.Tab"})}let ke="div";function $e(e,a){let{selectedIndex:r}=A("Tab.Panels"),n=G(a),l=i.useMemo(()=>({selectedIndex:r}),[r]);return U({ourProps:{ref:n},theirProps:e,slot:l,defaultTag:ke,name:"Tabs.Panels"})}let Fe="div",Re=ee.RenderStrategy|ee.Static;function Ae(e,a){var r,n,l,o;let c=ae(),{id:p=`headlessui-tabs-panel-${c}`,tabIndex:b=0,...s}=e,{selectedIndex:m,tabs:v,panels:d}=A("Tab.Panel"),w=Q("Tab.Panel"),f=i.useRef(null),D=G(f,a);z(()=>w.registerPanel(f),[w,f]);let L=ne("panels"),g=d.indexOf(f);g===-1&&(g=L);let h=g===m,C=i.useMemo(()=>({selected:h}),[h]),S={ref:D,id:p,role:"tabpanel","aria-labelledby":(n=(r=v[g])==null?void 0:r.current)==null?void 0:n.id,tabIndex:h?b:-1};return!h&&((l=s.unmount)==null||l)&&!((o=s.static)!=null&&o)?R.createElement(te,{as:"span","aria-hidden":"true",...S}):U({ourProps:S,theirProps:s,slot:C,defaultTag:Fe,features:Re,visible:h,name:"Tabs.Panel"})}let De=M(Se),Le=M(Pe),Oe=M(Ee),qe=M($e),Me=M(Ae),T=Object.assign(De,{Group:Le,List:Oe,Panels:qe,Panel:Me});function Je(){const{data:e,setData:a,post:r,processing:n,errors:l,reset:o}=oe({name:"",email:"",password:"",password_confirmation:"",parent_name:"",parent_email:"",parent_name2:"",parent_email2:"",graduation_year:"",school:""}),[c,p]=i.useState(0);i.useEffect(()=>()=>{o("password","password_confirmation")},[]);const b=s=>{s.preventDefault(),r(route("register.scholars"))};return t.jsxs(ue,{children:[t.jsx(ie,{title:"Register Scholar"}),t.jsxs("main",{className:"mt-0 transition-all duration-200 ease-soft-in-out",children:[t.jsxs("section",{className:"mb-6",children:[t.jsxs("div",{className:"relative flex items-start pt-8 pb-42 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl bg-black",children:[t.jsx("span",{className:"absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-red-800 to-red-600 opacity-80"}),t.jsx("div",{className:"container z-10",children:t.jsx("div",{className:"flex flex-wrap justify-center -mx-3",children:t.jsxs("div",{className:"w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12",children:[t.jsx("h1",{className:"mt-16 mb-2 text-white",children:"Welcome! Early Recognition Scholars"}),t.jsx("p",{className:"text-white",children:"Please register below. "})]})})})]}),t.jsx("div",{className:"container",children:t.jsx("div",{className:"flex flex-wrap -mx-3 -mt-12 md:-mt-20 lg:-mt-40",children:t.jsx("div",{className:"w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-5/12",children:t.jsx("div",{className:"relative z-0 flex flex-col h-[575px] min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border",children:t.jsx("div",{className:"flex-auto p-6",children:t.jsxs(T.Group,{selectedIndex:c,onChange:p,children:[t.jsx("div",{className:"py-8",children:t.jsxs(T.List,{children:[t.jsx(T,{as:i.Fragment,children:({selected:s})=>t.jsx("button",{className:s?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"Register"})}),t.jsx(T,{as:i.Fragment,children:({selected:s})=>t.jsx("button",{className:s?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"Parent Info"})}),t.jsx(T,{as:i.Fragment,children:({selected:s})=>t.jsx("button",{className:s?"border-spacing-1 border-2 rounded border-red-800 text-red-800 py-2 w-1/3":"bg-white text-black py-2 w-1/3",children:"School Information"})})]})}),t.jsx(T.Panels,{children:t.jsxs("form",{onSubmit:b,className:"py-4",children:[t.jsxs(T.Panel,{children:[t.jsxs("div",{children:[t.jsx(N,{htmlFor:"name",value:"Name"}),t.jsx(y,{id:"name",name:"name",value:e.name,className:"mt-1 block w-full",autoComplete:"name",isFocused:!0,onChange:s=>a("name",s.target.value),required:!0}),t.jsx(j,{message:l.name,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"email",value:"Email"}),t.jsx(y,{id:"email",type:"email",name:"email",value:e.email,className:"mt-1 block w-full",autoComplete:"username",onChange:s=>a("email",s.target.value),required:!0}),t.jsx(j,{message:l.email,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"password",value:"Password"}),t.jsx(y,{id:"password",type:"password",name:"password",value:e.password,className:"mt-1 block w-full",autoComplete:"new-password",onChange:s=>a("password",s.target.value),required:!0}),t.jsx(j,{message:l.password,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"password_confirmation",value:"Confirm Password"}),t.jsx(y,{id:"password_confirmation",type:"password",name:"password_confirmation",value:e.password_confirmation,className:"mt-1 block w-full",autoComplete:"new-password",onChange:s=>a("password_confirmation",s.target.value),required:!0}),t.jsx(j,{message:l.password_confirmation,className:"mt-2"})]}),t.jsx("div",{className:"flex items-center justify-end mt-4",children:t.jsx(Z,{href:route("login"),className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",children:"Already registered?"})})]}),t.jsxs(T.Panel,{children:[t.jsxs("div",{children:[t.jsx(N,{htmlFor:"parent_name",value:"Parent/Gaurdian name"}),t.jsx(y,{id:"parent_name",name:"parent_name",value:e.parent_name,className:"mt-1 block w-full",autoComplete:"parent_name",isFocused:!0,onChange:s=>a("parent_name",s.target.value),required:!0}),t.jsx(j,{message:l.parent_name,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"parent_email",value:"Parent/Gaurdian Email"}),t.jsx(y,{id:"parent_email",type:"email",name:"parent_email",value:e.parent_email,className:"mt-1 block w-full",autoComplete:"username",onChange:s=>a("parent_email",s.target.value),required:!0}),t.jsx(j,{message:l.parent_email,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"parent_name2",value:"Secondary Parent/Gaurdian name"}),t.jsx(y,{id:"parent_name2",name:"parent_name2",value:e.parent_name2,className:"mt-1 block w-full",autoComplete:"parent_name2",onChange:s=>a("parent_name2",s.target.value),required:!0}),t.jsx(j,{message:l.parent_name2,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"parent_email2",value:"Secondary Parent/Gaurdian  Email"}),t.jsx(y,{id:"parent_email2",type:"email",name:"parent_email2",value:e.parent_email2,className:"mt-1 block w-full",autoComplete:"email2",onChange:s=>a("parent_email2",s.target.value),required:!0}),t.jsx(j,{message:l.parent_email2,className:"mt-2"})]})]}),t.jsxs(T.Panel,{children:[t.jsxs("div",{children:[t.jsx(N,{htmlFor:"school",value:"School Name"}),t.jsx(y,{id:"school",name:"school",value:e.school,className:"mt-1 block w-full",autoComplete:"school",isFocused:!0,onChange:s=>a("school",s.target.value),required:!0}),t.jsx(j,{message:l.school,className:"mt-2"})]}),t.jsxs("div",{className:"mt-4",children:[t.jsx(N,{htmlFor:"graduation_year",value:"Graduation Year"}),t.jsx(y,{id:"graduation_year",name:"graduation_year",value:e.graduation_year,className:"mt-1 block w-full",autoComplete:"graduation year",onChange:s=>a("graduation_year",s.target.value),required:!0}),t.jsx(j,{message:l.graduation_year,className:"mt-2"})]}),t.jsxs("div",{className:"flex items-center justify-end mt-4",children:[t.jsx(Z,{href:route("login"),className:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",children:"Already registered?"}),t.jsx(ce,{className:"ml-4",disabled:n,children:"Submit"})]})]})]})})]})})})})})})]}),t.jsx("footer",{className:"py-2",children:t.jsxs("div",{className:"container",children:[t.jsx("div",{className:"flex flex-wrap -mx-3"}),t.jsx("div",{className:"flex flex-wrap -mx-3",children:t.jsx("div",{className:"w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0",children:t.jsxs("p",{className:"mb-0 text-slate-400",children:["Copyright ©",t.jsx("script",{children:"document.write(new Date().getFullYear());"}),"Urban League - Black Scholars."]})})})]})})]})]})}export{Je as default};