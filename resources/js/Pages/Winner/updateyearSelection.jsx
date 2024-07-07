import React from 'react';
import Select from 'react-select';
import { components } from "react-select";


const uses = [
  { id: 1, value: 'yearly', label: 'yearly' },
  { id: 2, value: 'one-time', label: 'one-time' },
]

const usesMax = props => {
  const optionSelectedLength = props.getValue().length || 0;
  return (
    <components.usesMax {...props}>
      {optionSelectedLength < 3 ? (
        props.children
      ) : (
        <div style={{ margin: 15 }}>Max limit achieved</div>
      )}
    </components.usesMax>
  );
};

  
export default function distributionSelection({selectedFrequnecy, setSelectedFrequnecy}) {
    const isValidNewOption = (selectedFrequnecy) => selectedFrequnecy.length < 3;
  
    const handleChange = (e) => {
      setSelectedFrequnecy(Array.isArray(e) ? e.map(x => x.value) : []);
    }
  
    return (
  
      <Select
        placeholder="Scholarship Frequnecy"
        components={{ usesMax }}
        value={uses.filter(obj => selectedFrequnecy.includes(obj.value))} 
        isValidNewOption={isValidNewOption}
        name="uses"
        className="basic-multi-select py-2 text-left text-sm"
        touchUi={false}
        onChange={handleChange} 
        options={uses}
      />
    )
}