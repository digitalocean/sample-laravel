import React, { useState } from 'react';
import Select from 'react-select';
import { components } from "react-select";

const requirements = [
  { id: 1.2, value: 'Recognition in the Salute to Black Scholars Program', label: 'Recognition in the Salute to Black Scholars Program' },
  { id: 2.2, value: 'Essay', label: 'Essay' },
  { id: 3.2, value: 'Transcipt', label: 'Transcipt' },
  { id: 4.2, value: 'Family Financial Documents (FAFSA)', label: 'Family Financial Documents (FAFSA)' },
  { id: 5.2, value: 'SAT or ACT scores', label: 'SAT or ACT scores' },
  { id: 6.2, value: 'Recommendations', label: 'Recommendations' },
]

const requirementMax = props => {
  const optionSelectedLength = props.getValue().length || 0;
  return (
    <components.requirementMax {...props}>
      {optionSelectedLength < 3 ? (
        props.children
      ) : (
        <div style={{ margin: 15 }}>Max limit achieved</div>
      )}
    </components.requirementMax>
  );
};

export default function RequirementsSelect({selectedValue, setSelectedValue}) {

  const isValidNewOption = (selectValue) => selectValue.length < 3;

  const handleChange = (e) => {
    setSelectedValue(Array.isArray(e) ? e.map(x => x.value) : []);
  }

  return (

    <Select
      placeholder="Select 3 Requirements"
      components={{ requirementMax }}
      isMulti
      value={requirements.filter(obj => selectedValue.includes(obj.value))} 
      isValidNewOption={isValidNewOption}
      name="requirements"
      className="basic-multi-select py-2 text-left"
      touchUi={false}
      onChange={handleChange} 
      options={requirements}
    />
  )
}