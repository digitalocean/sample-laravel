import React from 'react';
import Select from 'react-select';
import { components } from "react-select";


const basis = [
  { id: 1.1, value: 'Merit', label: 'Merit' },
  { id: 2.1, value: 'Financial need', label: 'Financial need' },
  { id: 3.1, value: 'Merit and Financial need', label: 'Merit and Financial need' },
]

const basisMax = props => {
  const optionSelectedLength = props.getValue().length || 0;
  return (
    <components.basisMax {...props}>
      {optionSelectedLength < 1 ? (
        props.children
      ) : (
        <div style={{ margin: 15 }}>Max limit achieved</div>
      )}
    </components.basisMax>
  );
};


export default function BasisSelect({selectBasis, setSelectBasis}) {
  const isValidNewOption = (selectBasis) => selectBasis.length < 1;

  const handleChange = (e) => {
    setSelectBasis(Array.isArray(e) ? e.map(x => x.value) : []);
  }

  return (

    <Select
      placeholder="Scholarship basis"
      components={{ basisMax }}
      isMulti
      value={basis.filter(obj => selectBasis.includes(obj.value))} 
      isValidNewOption={isValidNewOption}
      name="basis"
      className="basic-multi-select py-2 text-left text-sm"
      touchUi={false}
      onChange={handleChange} 
      options={basis}
    />
  )
}