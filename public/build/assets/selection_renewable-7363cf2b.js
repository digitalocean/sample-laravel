import{j as t}from"./app-92c14741.js";import{S as c,c as o}from"./react-select.esm-e1248add.js";import"./assertThisInitialized-7ace02bf.js";const i=[{id:1.1,value:"Merit",label:"Merit"},{id:2.1,value:"Financial need",label:"Financial need"},{id:3.1,value:"Merit and Financial need",label:"Merit and Financial need"}],d=n=>{const a=n.getValue().length||0;return t.jsx(o.rewewMax,{...n,children:a<2?n.children:t.jsx("div",{style:{margin:15},children:"Max limit achieved"})})};function p({selectedRenew:n,setSelectedRenew:a}){const l=e=>e.length<3,r=e=>{a(Array.isArray(e)?e.map(s=>s.value):[])};return t.jsx(c,{placeholder:"Scholarship renew options",components:{rewewMax:d},isMulti:!0,value:i.filter(e=>n.includes(e.value)),isValidNewOption:l,name:"renew",className:"basic-multi-select py-2 text-left text-sm",touchUi:!1,onChange:r,options:i})}export{p as default};
