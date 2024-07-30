import { Fragment, useState } from 'react';
import { Listbox, Transition } from '@headlessui/react';
import { ChevronUpDownIcon, CheckIcon } from '@heroicons/react/24/solid';


const criteria = [
  { id: 1, name: 'Resident of a specific geographic area' },
  { id: 2, name: 'Intend to pursue a specific course of study' },
  { id: 3, name: 'Minimum grade point average (4.0 scale)' },
  { id: 4, name: 'Graduate of a specific high school' },
  { id: 5, name: 'Full-time or part tine enrollment' },
  { id: 6, name: 'Attend a certain type of institution' },
  { id: 7, name: 'Proficient in a particular area, such as art, music' },
  { id: 8, name: 'Community or volunteer service' },
]

function classNames(...classes) {
  return classes.filter(Boolean).join(' ')
}

export default function CriteriaSelect({selected, setSelected}) {
  
  return (
    <Listbox value={selected} onChange={setSelected} multiple>
    {({ open }) => (
      <>
        <div className="relative mt-2">
          <Listbox.Button className="relative w-full cursor-default rounded-md bg-white py-1.5 pl-3 pr-10 h-10 text-left text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
            <span className="block truncate">Criteria list</span>
            <span className="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2">
              <ChevronUpDownIcon className="h-5 w-5 text-gray-400" aria-hidden="true" />
            </span>
          </Listbox.Button>

          <Transition
            show={open}
            as={Fragment}
            leave="transition ease-in duration-100"
            leaveFrom="opacity-100"
            leaveTo="opacity-0"
          >
            <Listbox.Options className="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base text-left shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm">
              {criteria.map((criteria) => (
                <Listbox.Option
                  key={criteria.id}
                  className={({ active }) =>
                    classNames(
                      active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                      'relative cursor-default select-none py-2 pl-8 pr-4'
                    )
                  }
                  value={criteria}
                >
                  {({ selected, active }) => (
                    <>
                      <span className={classNames(selected ? 'font-semibold' : 'font-normal', 'block truncate')}>
                        {criteria.name}
                      </span>

                      {selected ? (
                        <span
                          className={classNames(
                            active ? 'text-white' : 'text-indigo-600',
                            'absolute inset-y-0 left-0 flex items-center pl-1.5'
                          )}
                        >
                          <CheckIcon className="h-5 w-5" aria-hidden="true" />
                        </span>
                      ) : null}
                    </>
                  )}
                </Listbox.Option>
              ))}
            </Listbox.Options>
          </Transition>
        </div>
      </>
    )}
  </Listbox>
  )
}