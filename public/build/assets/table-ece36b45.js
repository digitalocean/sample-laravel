import{q as w,j as e,d as j}from"./app-92c14741.js";import{Z as R,u as A,M,c as S,B as C,a as t,d as r,b as I,L as b,A as f,I as i,J as d}from"./AccountCircle-a26cf930.js";function E(){const{applications:p}=w().props,{data:c}=p;console.log(c);const s=S(),x=[s.accessor("name",{header:"Student Name",size:300}),s.accessor("school",{header:"Attending School",size:300}),s.accessor("gpa",{header:"GPA",size:50}),s.accessor("sat_Score",{header:"SAT",size:50}),s.accessor("act_score",{header:"ACT",size:50}),s.accessor("college_choice",{header:"College Choice",size:250}),s.accessor("college_major",{header:"Major",size:50}),s.accessor("submitted_on",{header:"Submitted On"})],a=R({fieldSeparator:",",decimalSeparator:".",useKeysAsHeaders:!0}),n=o=>{const l=o.map(m=>m.original),u=i(a)(l);d(a)(u)},g=()=>{const o=i(a)(c);d(a)(o)},h=A({columns:x,data:c,enableRowSelection:!0,enableRowActions:!0,columnFilterDisplayMode:"popover",paginationDisplayMode:"pages",positionToolbarAlertBanner:"bottom",renderTopToolbarCustomActions:({table:o})=>e.jsxs(C,{sx:{display:"flex",gap:"16px",padding:"8px",flexWrap:"wrap"},children:[e.jsx(t,{onClick:g,startIcon:e.jsx(r,{}),children:"Export All Data"}),e.jsx(t,{disabled:o.getPrePaginationRowModel().rows.length===0,onClick:()=>n(o.getPrePaginationRowModel().rows),startIcon:e.jsx(r,{}),children:"Export All Rows"}),e.jsx(t,{disabled:o.getRowModel().rows.length===0,onClick:()=>n(o.getRowModel().rows),startIcon:e.jsx(r,{}),children:"Export Page Rows"}),e.jsx(t,{disabled:!o.getIsSomeRowsSelected()&&!o.getIsAllRowsSelected(),onClick:()=>n(o.getSelectedRowModel().rows),startIcon:e.jsx(r,{}),children:"Export Selected Rows"})]}),renderRowActionMenuItems:({closeMenu:o,row:l})=>[e.jsxs(I,{onClick:()=>{o()},sx:{m:0},children:[e.jsx(b,{children:e.jsx(f,{})}),e.jsx(j,{href:route("application.view",l.original.id),children:"View full application"})]},0)]});return e.jsx(M,{table:h})}export{E as A};
