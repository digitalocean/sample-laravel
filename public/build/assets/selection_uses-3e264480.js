import{j as n}from"./app-92c14741.js";import{S as r,c as u}from"./react-select.esm-e1248add.js";import"./assertThisInitialized-7ace02bf.js";const s=[{id:1,value:"Undergraduate expenses",label:"Undergraduate expenses"},{id:2,value:"Tuition, room and board, and/or related expenses",label:"Tuition, room and board, and/or related expenses"},{id:3,value:"Freshman year",label:"Freshman year"},{id:4,value:"Study abroad expenses",label:"Study abroad expenses"},{id:5,value:"Tuition only",label:"Tuition only"},{id:6,value:"Emergency tution",label:"Emergency tution"}],d=a=>{const t=a.getValue().length||0;return n.jsx(u.usesMax,{...a,children:t<3?a.children:n.jsx("div",{style:{margin:15},children:"Max limit achieved"})})};function h({selectedUses:a,setSelectedUses:t}){const l=e=>e.length<3,i=e=>{t(Array.isArray(e)?e.map(o=>o.value):[])};return n.jsx(r,{placeholder:"Scholarship uses",components:{usesMax:d},isMulti:!0,value:s.filter(e=>a.includes(e.value)),isValidNewOption:l,name:"uses",className:"basic-multi-select py-2 text-left text-sm",touchUi:!1,onChange:i,options:s})}export{h as default};
