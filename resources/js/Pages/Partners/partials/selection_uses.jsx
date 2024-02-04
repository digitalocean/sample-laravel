import React from 'react';
import Select from 'react-select';
import { components } from "react-select";


const uses = [
  { id: 1, value: 'Undergraduate expenses', label: 'Undergraduate expenses' },
  { id: 2, value: 'Tuition, room and board, and/or related expenses', label: 'Tuition, room and board, and/or related expenses' },
  { id: 3, value: 'Freshman year', label: 'Freshman year' },
  { id: 4, value: 'Study abroad expenses', label: 'Study abroad expenses' },
  { id: 5, value: 'Tuition only', label: 'Tuition only' },
  { id: 6, value: 'Emergency tution', label: 'Emergency tution' },
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

  
export default function UsesSelect({selectedUses, setSelectedUses}) {
    const isValidNewOption = (selectedUses) => selectedUses.length < 3;
  
    const handleChange = (e) => {
      setSelectedUses(Array.isArray(e) ? e.map(x => x.value) : []);
    }
  
    return (
  
      <Select
        placeholder="Scholarship uses"
        components={{ usesMax }}
        isMulti
        value={uses.filter(obj => selectedUses.includes(obj.value))} 
        isValidNewOption={isValidNewOption}
        name="uses"
        className="basic-multi-select py-2 text-left text-sm"
        touchUi={false}
        onChange={handleChange} 
        options={uses}
      />
    )
}