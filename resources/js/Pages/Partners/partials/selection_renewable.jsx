import React from 'react';
import Select from 'react-select';
import { components } from "react-select";


const renew = [
  { id: 1.1, value: 'Merit', label: 'Merit' },
  { id: 2.1, value: 'Financial need', label: 'Financial need' },
  { id: 3.1, value: 'Merit and Financial need', label: 'Merit and Financial need' },
]

const rewewMax = props => {
  const optionSelectedLength = props.getValue().length || 0;
  return (
    <components.rewewMax {...props}>
      {optionSelectedLength < 2 ? (
        props.children
      ) : (
        <div style={{ margin: 15 }}>Max limit achieved</div>
      )}
    </components.rewewMax>
  );
};

export default function BasisSelect({selectedRenew, setSelectedRenew}) {
const isValidNewOption = (selectedRenew) => selectedRenew.length < 3;

  const handleChange = (e) => {
    setSelectedRenew(Array.isArray(e) ? e.map(x => x.value) : []);
  }

  return (

    <Select
      placeholder="Scholarship renew options"
      components={{ rewewMax }}
      value={renew.filter(obj => selectedRenew.includes(obj.value))} 
      isValidNewOption={isValidNewOption}
      name="renew"
      className="basic-multi-select py-2 text-left text-sm"
      touchUi={false}
      onChange={handleChange} 
      options={renew}
    />
  )
}