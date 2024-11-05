import{r as l,q as c,j as e,d as n,a as m}from"./app-bd562423.js";import{A as b}from"./AuthenticatedLayout-cbec738a.js";import{q as d}from"./menu-2a90fe06.js";import"./transition-24ce3594.js";import"./use-is-mounted-1cc2b942.js";import"./keyboard-a40a17a3.js";import"./bugs-c663e546.js";import"./use-owner-f761fa5f.js";import"./use-resolve-button-type-ddbab6d0.js";import"./use-text-value-83367a17.js";function p({title:i,titleId:a,...o},r){return l.createElement("svg",Object.assign({xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor","aria-hidden":"true","data-slot":"icon",ref:r,"aria-labelledby":a},o),i?l.createElement("title",{id:a},i):null,l.createElement("path",{fillRule:"evenodd",d:"M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z",clipRule:"evenodd"}))}const x=l.forwardRef(p),h=x;function z({auth:i}){const{winners:a,year:o}=c().props;function r(...t){return t.filter(Boolean).join(" ")}return e.jsxs(b,{user:i.user,header:e.jsx("h2",{className:"font-semibold text-xl text-gray-800 leading-tight",children:"Select Winners"}),breadcrumb:e.jsx("span",{children:e.jsx(n,{href:route("dashboard"),children:"Dashboard"})}),children:[e.jsx(m,{title:"Selected Winners"}),e.jsx("div",{className:"mx-6 mt-6 px-4 sm:px-6 lg:px-8 bg-white rounded-md",children:e.jsxs("div",{className:"p-6",children:[e.jsxs("div",{className:"sm:flex sm:items-center",children:[e.jsxs("div",{className:"sm:flex-auto",children:[e.jsx("h1",{className:"text-xl font-semibold leading-6 text-gray-900",children:"Selected Winners"}),e.jsx("p",{className:"mt-2 text-base text-gray-700",children:"A list of all the winners selected by year."})]}),e.jsx("div",{className:"mt-4 sm:ml-16 sm:mt-0 sm:flex-none",children:e.jsxs(d,{as:"div",className:"relative inline-block text-left",children:[e.jsx("div",{children:e.jsxs(d.Button,{className:"inline-flex w-full justify-center gap-x-1.5 rounded-md bg-red-700 px-6 py-2 text-base font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-red-600",children:["Options",e.jsx(h,{"aria-hidden":"true",className:"-mr-1 h-5 w-5 text-gray-400"})]})}),e.jsx(d.Items,{transition:!0,className:"absolute right-0 z-10 mt-2 w-56 origin-top-left rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 transition focus:outline-none data-[closed]:scale-95 data-[closed]:transform data-[closed]:opacity-0 data-[enter]:duration-100 data-[leave]:duration-75 data-[enter]:ease-out data-[leave]:ease-in",children:e.jsx("div",{className:"py-1",children:o.map(t=>e.jsx(d.Item,{as:l.Fragment,children:({active:s})=>e.jsx("a",{href:route("winners.list",t.activeYear),className:`${s?"bg-blue-500 text-white block px-4 py-2 text-base data-[focus]:bg-gray-100 data-[focus]:text-gray-90":"block px-4 py-2 text-base text-gray-700 data-[focus]:bg-gray-100 data-[focus]:text-gray-90"}`,children:t.activeYear})},t.activeYear))})})]})})]}),e.jsx("div",{className:"mt-8 flow-root",children:e.jsx("div",{className:"-mx-4 -my-2 sm:-mx-6 lg:-mx-8",children:e.jsx("div",{className:"inline-block min-w-full py-2 align-middle",children:e.jsxs("table",{className:"min-w-full border-separate border-spacing-0",children:[e.jsx("thead",{children:e.jsxs("tr",{children:[e.jsx("th",{scope:"col",className:"sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8",children:"Name"}),e.jsx("th",{scope:"col",className:"sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell",children:"Scholarship"}),e.jsx("th",{scope:"col",className:"sticky top-0 z-10 hidden border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell",children:"Email"}),e.jsx("th",{scope:"col",className:"sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter",children:"Distribuition Date"}),e.jsx("th",{scope:"col",className:"sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter",children:"Award Amount"}),e.jsx("th",{scope:"col",className:"sticky top-0 z-10 border-b border-gray-300 bg-white bg-opacity-75 py-3.5 pl-3 pr-4 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8",children:e.jsx("span",{className:"sr-only",children:"Edit"})})]})}),e.jsx("tbody",{children:a.map((t,s)=>e.jsxs("tr",{children:[e.jsx("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","whitespace-nowrap py-4 pl-4 pr-3 text-base font-medium text-gray-900 sm:pl-6 lg:pl-8"),children:t.studentName}),e.jsx("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","hidden whitespace-nowrap px-3 py-4 text-base text-gray-700 sm:table-cell"),children:t.scholarshipName}),e.jsx("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","hidden whitespace-nowrap px-3 py-4 text-base text-gray-700 lg:table-cell"),children:t.studentEmail}),e.jsx("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","whitespace-nowrap px-3 py-4 text-base text-gray-700"),children:t.distributionDate}),e.jsxs("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","whitespace-nowrap px-3 py-4 text-base text-gray-700"),children:["$",t.award_payments," - ",t.frequnecy]}),e.jsx("td",{className:r(s!==a.length-1?"border-b border-gray-200":"","relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-base font-medium sm:pr-8 lg:pr-8"),children:e.jsxs("a",{href:route("scholarship.show",t.scholarship_id),className:"text-indigo-800 hover:text-indigo-900",children:["View Scholarship",e.jsxs("span",{className:"sr-only",children:[", ",t.studentName]})]})})]},t.email))})]})})})})]})})]})}export{z as default};