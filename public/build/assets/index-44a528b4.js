import{j as e,d as s,a as x}from"./app-92c14741.js";import{A as i,c as o}from"./AuthenticatedLayout-636344fe.js";import c from"./create_Partner-98a97138.js";import"./transition-912c7495.js";import"./TextInput-24070958.js";import"./Checkbox-fe3bdb5d.js";import"./CheckIcon-cde8bb9d.js";import"./dialog-6ced0617.js";import"./keyboard-55cd7b26.js";function P({auth:t,partners:l}){return e.jsxs(i,{user:t.user,header:e.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"partners"}),breadcrumb:e.jsx("span",{children:e.jsx(s,{href:route("partner.list"),children:"Partner list"})}),children:[e.jsx(x,{title:"Partners"}),e.jsx("div",{class:"w-full px-6 py-6 mx-auto",children:e.jsx("div",{class:"w-full max-w-full px-3 xl:w-3/3 xl:flex-none mb-10",children:e.jsxs("div",{class:"flex flex-wrap -mx-3",children:[e.jsx("div",{class:"sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-full px-3 lg:flex-none mt-4",children:e.jsx(c,{})}),l.map(({id:r,organization_name:a,contact_name:n,email:d,phones:m,address:p,consent:h})=>e.jsx(e.Fragment,{children:e.jsx("div",{class:"sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-full px-3 lg:flex-none mt-4",children:e.jsx(s,{className:"items-center",href:route("partner.show",r),children:e.jsxs("div",{class:"relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border items-center",children:[e.jsx("div",{class:"p-4 mx-[15%] mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent",children:e.jsx("div",{class:"sm:w-full text-center bg-center icon bg-gradient-to-tl from-red-900 to-red-500 shadow-soft-2xl rounded-xl items-center",children:e.jsx(o,{className:"h-20 w-20 p-4 text-white"})})}),e.jsxs("div",{class:"flex-auto p-4 pt-0 text-center",children:[e.jsx("p",{class:"mb-0 text-center md:text-base lg:text-lg text-gray-700",children:a}),e.jsx("span",{class:"leading-tight text-sm",children:n}),e.jsx("hr",{class:"h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent"}),e.jsx("p",{class:"mb-0 md:text-sm text-gray-700 ",children:d})]})]})})},r)}))]})})})]})}export{P as default};
