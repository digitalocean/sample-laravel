import{r as l,q as o,j as e,d as c,a as d}from"./app-3008ac31.js";import{A as x}from"./AuthenticatedLayout-74f23c65.js";import h from"./Table-d103cdd1.js";import"./transition-4f7741bd.js";import"./AccountCircle-a848b2e6.js";import"./assertThisInitialized-2e712575.js";import"./index-f823fe87.js";function m({title:s,titleId:a,...r},t){return l.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor","aria-hidden":"true","data-slot":"icon",ref:t,"aria-labelledby":a},r),s?l.createElement("title",{id:a},s):null,l.createElement("path",{d:"M10.464 8.746c.227-.18.497-.311.786-.394v2.795a2.252 2.252 0 0 1-.786-.393c-.394-.313-.546-.681-.546-1.004 0-.323.152-.691.546-1.004ZM12.75 15.662v-2.824c.347.085.664.228.921.421.427.32.579.686.579.991 0 .305-.152.671-.579.991a2.534 2.534 0 0 1-.921.42Z"}),l.createElement("path",{fillRule:"evenodd",d:"M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 6a.75.75 0 0 0-1.5 0v.816a3.836 3.836 0 0 0-1.72.756c-.712.566-1.112 1.35-1.112 2.178 0 .829.4 1.612 1.113 2.178.502.4 1.102.647 1.719.756v2.978a2.536 2.536 0 0 1-.921-.421l-.879-.66a.75.75 0 0 0-.9 1.2l.879.66c.533.4 1.169.645 1.821.75V18a.75.75 0 0 0 1.5 0v-.81a4.124 4.124 0 0 0 1.821-.749c.745-.559 1.179-1.344 1.179-2.191 0-.847-.434-1.632-1.179-2.191a4.122 4.122 0 0 0-1.821-.75V8.354c.29.082.559.213.786.393l.415.33a.75.75 0 0 0 .933-1.175l-.415-.33a3.836 3.836 0 0 0-1.719-.755V6Z",clipRule:"evenodd"}))}const f=l.forwardRef(m),p=f;function v({title:s,titleId:a,...r},t){return l.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",fill:"currentColor","aria-hidden":"true","data-slot":"icon",ref:t,"aria-labelledby":a},r),s?l.createElement("title",{id:a},s):null,l.createElement("path",{fillRule:"evenodd",d:"M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.04 16.5.5-1.5h6.42l.5 1.5H8.29Zm7.46-12a.75.75 0 0 0-1.5 0v6a.75.75 0 0 0 1.5 0v-6Zm-3 2.25a.75.75 0 0 0-1.5 0v3.75a.75.75 0 0 0 1.5 0V9Zm-3 2.25a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0v-1.5Z",clipRule:"evenodd"}))}const w=l.forwardRef(v),u=w;function Z({auth:s}){const{allScholaships:a}=o().props,{data:r}=a,t=r.reduce((n,i)=>n+i.fund_amount,0);return e.jsxs(x,{user:s.user,header:e.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"Scholarships"}),breadcrumb:e.jsx("span",{children:e.jsx(c,{href:route("scholarship.list"),children:"Scholarship list"})}),children:[e.jsx(d,{title:"Scholarships"}),e.jsxs("div",{className:"w-full px-6 py-6 mx-auto",children:[e.jsxs("div",{className:"flex flex-wrap -mx-1",children:[e.jsx("div",{className:"w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3",children:e.jsx("div",{className:"relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border",children:e.jsx("div",{className:"flex-auto p-4",children:e.jsxs("div",{className:"flex flex-row -mx-3",children:[e.jsx("div",{className:"flex-none w-2/3 max-w-full px-3",children:e.jsxs("div",{children:[e.jsx("p",{className:"mb-0 font-sans font-semibold leading-normal text-base",children:"Total Scholarships"}),e.jsx("h5",{className:"mb-0 font-bold",children:r.length})]})}),e.jsx("div",{className:"px-3 text-right basis-1/3",children:e.jsx("div",{className:"inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500",children:e.jsx(u,{className:"leading-none w-6 h-6 relative top-3.5 text-white"})})})]})})})}),e.jsx("div",{className:"w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/3",children:e.jsx("div",{className:"relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border",children:e.jsx("div",{className:"flex-auto p-4",children:e.jsxs("div",{className:"flex flex-row -mx-3",children:[e.jsx("div",{className:"flex-none w-2/3 max-w-full px-3",children:e.jsxs("div",{children:[e.jsx("p",{className:"mb-0 font-sans font-semibold leading-normal text-base",children:"Total Scholarship Dollars"}),t==="0"?e.jsx("span",{className:"text-4xl text-black ml-5",children:"$0.00"}):e.jsxs("h5",{className:"mb-0 font-bold",children:["$",t.toFixed(2)]})]})}),e.jsx("div",{className:"px-3 text-right basis-1/3",children:e.jsx("div",{className:"inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500",children:e.jsx(p,{className:"leading-none w-6 h-6 relative top-3.5 text-white"})})})]})})})})]}),e.jsx("div",{className:"py-6",children:e.jsx(h,{allScholaships:a})})]})]})}export{Z as default};
