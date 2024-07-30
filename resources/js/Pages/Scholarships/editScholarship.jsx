import React from 'react';
import { useRef, useState } from 'react';
import {Head, router, Link } from '@inertiajs/react'
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { CheckIcon  } from '@heroicons/react/24/outline';
import SelectionCriteria from '@/Pages/Partners/./partials/selection_criteria';
import SelectionRequirements from '@/Pages/Partners/./partials/selection_requirements';
import UsesSelect from '@/Pages/Partners/./partials/selection_uses';
import RenewSelect from '@/Pages/Partners/./partials/selection_renewable';
import BasisSelect from '@/Pages/Partners/./partials/selection_basis';
import { PlusIcon } from '@heroicons/react/24/solid';
import { Dialog, Transition } from '@headlessui/react';


export default function EditScholarship({auth, data, role}) {
  
  const [data1, setData] = useState({});
  
  let [isOpen, setIsOpen] = useState(false)

  const cancelButtonRef = useRef(null);
  
  const [selected, setSelected] = useState([]);
  const [selectedValue, setSelectedValue] = useState([]);
  const [selectBasis, setSelectBasis] = useState([]);
  const [selectedRenew, setSelectedRenew] = useState([]);
  const [selectedUses, setSelectedUses] = useState([]);
  // const [selectedView, setSelectedView] = useState([]);  

  function closeModal() {
    setIsOpen(false)
  }

  function openModal() {
    setIsOpen(true)
  }
  
  function handleChange(e) {
    const key = e.target.id;
    const value = e.target.value;
    setData(data1 => ({
        ...data1,
        [key]: value,
    }))
  }

  function handleSubmit(e) {
    e.preventDefault()
    router.post(route('scholarship.update'), [data1, selected, selectedValue, selectBasis, selectedRenew, selectedUses] );
    console.log(data1, selected, selectedValue, selectBasis);
  }

  return (
    <Authenticated
    user={auth.user}
    header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Scholarships Information </h2>}
    breadcrumb={<span> 
      {role === 'admin' 
        ?<Link href={route('scholarship.list')}>Scholarship list</Link> 
        : <span>Scholarship list</span>  
      } </span> }
  > 
    
    <Head title="Scholarships" />
       
    <div className="w-full px-6 py-6 mx-auto my-10">
      <div className="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/100 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
                    <div className="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                      <CheckIcon className="h-6 w-6 text-green-600" aria-hidden="true" />
                    </div>

                    {data?.map(({id, name, 
                        deadline,
                        description,
                        award_payments,
                        additional_information,
                        review_applicants,
                        selection_criteria,
                        requirement_criteria,
                        award_based_on,
                        renewability,
                        uses,
                        fund_amount}) => (
                      <>

                    <div className="mt-3 text-center sm:mt-5">
                      <h3 className="text-base font-semibold leading-6 text-gray-900">Edit Scholarship</h3>
                      <div className="mt-2">
                      
                  
                      <form onSubmit={handleSubmit}>
                        <div key={id} className="space-y-12">
                     
                          <div className="border-b border-gray-900/10 pb-8">
                        
                  
                            <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                              <div className="col-span-full">
                                <label htmlFor="street-address" className="block text-base text-left font-medium leading-6 text-gray-900">
                                  Scholarship name
                                </label>
                                <div className="mt-2">
                                  <input
                                    type="text"
                                    name="scholarshship-name"
                                    value={data1.name}
                                    id="name"
                                    autoComplete="scholarshship-name"
                                    onChange={handleChange}
                                    defaultValue={name}
                                    className="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  />
                                </div>
                              </div>

                              <div className="col-span-full">
                                <label htmlFor="about" className="block text-base text-left font-medium leading-6 text-gray-900">
                                  Scholarship Description
                                </label>
                                <div className="mt-2">
                                  <textarea
                                    id="description"
                                    name="description"
                                    type="text"
                                    value={data1.description}
                                    rows={5}
                                    onChange={handleChange}
                                    className="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    defaultValue={description}
                                  />
                                </div>
                                <p className="mt-3 text-sm text-right leading-6 text-gray-600">Write a short description about the scholarship.</p>
                              </div>
                            </div>
                          </div>

                          <div className="border-b border-gray-900/10 pb-8">
                            <h2 className="text-base text-left font-semibold leading-7 text-gray-900">Scholarship Information</h2>
                            {/* <p className="mt-1 text-sm text-left leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> */}

                            <div className="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                              <div className="sm:col-span-3">
                                <label htmlFor="first-name" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Scholarship Deadline
                                </label>
                                <div className="mt-2">
                                  <input
                                    type="date"
                                    name="fullname"
                                    value={deadline}
                                    id="deadline"
                                    autoComplete="deadline"
                                    onChange={handleChange}
                                    defaultValue={deadline}
                                    className="block w-full rounded-md border-0 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="first-name" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Individual Award Amount
                                </label>
                                <div className="mt-2">
                                  <input
                                    type="text"
                                    name="award_payments"
                                    value={data.award_payments}
                                    id="award_payments"
                                    autoComplete="award_payments"
                                    onChange={handleChange}
                                    defaultValue={award_payments}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Fund Amount
                                </label>
                                <div className="mt-2">
                                  <input
                                    id="fund_amount"
                                    name="fund_amount"
                                    value={data.fund_amount}
                                    type="text"
                                    autoComplete="fund-amount"
                                    onChange={handleChange}
                                    defaultValue={fund_amount}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 />
                                </div>
                              </div>

                              {/* <div className="sm:col-span-3">
                                <label htmlFor="street-address" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Street address
                                </label>
                                <div className="mt-2">
                                  <input
                                    type="text"
                                    name="street-address"
                                    id="street-address"
                                    autoComplete="street-address"
                                    className="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                  />
                                </div>
                              </div> */}

                              <div className="sm:col-span-3">
                                  <label htmlFor="country" className="block text-base text-left font-medium leading-6 text-gray-900">
                                      Selection Criteria
                                   </label>
                                  <SelectionCriteria selected={selectedValue} setSelected={setSelected} defaultValue={selection_criteria}/>
                                  <p className='text-xs text-gray-600 text-left'>existing selection[{selection_criteria}]</p>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="country" className="block text-base text-left font-medium leading-6 text-gray-900">
                                  Requirements
                                </label>
                                <SelectionRequirements selectedValue={selectedValue} setSelectedValue={setSelectedValue} />
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="country" className="block text-base text-left font-medium leading-6 text-gray-900">
                                Possible basis for the Award
                                </label>
                                <BasisSelect selectBasis={selectBasis} setSelectBasis={setSelectBasis}/>
                              </div>
                              <div className="sm:col-span-3">
                                <label htmlFor="country" className="block text-base text-left font-medium leading-6 text-gray-900">
                                Frequency or Renew-ability of the Award
                                </label>
                                <RenewSelect selectedRenew={selectedRenew} setSelectedRenew={setSelectedRenew}/>
                              </div>
                              <div className="sm:col-span-3">
                                <label htmlFor="country" className="block text-base text-left font-medium leading-6 text-gray-900">
                                Possible allowable uses of Award by student
                                </label>
                                <UsesSelect  selectedUses={selectedUses} setSelectedUses={setSelectedUses}/>
                              </div>

                            </div>
                          </div>

                          <div className="border-b border-gray-900/10 pb-8">
                            {/* <h2 className="text-base text-left font-semibold leading-7 text-gray-900">Scholarship Rules</h2> */}
                            <div className="mt-4 space-y-10">
                              <div className="col-span-full">
                                <label htmlFor="about" className="block text-base text-left font-medium leading-6 text-gray-900">
                                  Additional information
                                </label>
                                <div className="mt-2">
                                  <textarea
                                    id="additional_information"
                                    name='additional_information'
                                    type="text"
                                    value={data.additional_information}
                                    rows={3}
                                    onChange={handleChange}
                                    className="block w-full rounded-md border-0 py-1.5 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    defaultValue={additional_information}
                                  />
                                </div>
                                <p className="mt-3 text-sm text-left leading-6 text-gray-600">Write a few additional sentences about the scholarship.</p>
                              </div>

                            </div>
                          </div>
                         
                        </div>

                        <div className="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                          <div className="sm:col-span-1">
                            <button
                              type="submit"
                              className="inline-block w-full px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 sm:col-start-1"
                              onClick={() => setIsOpen(false)}
                            >
                              Submit
                            </button>
                            </div>
                          <div className="sm:col-span-1">
                          <button
                            type="button"
                            className="inline-block w-full justify-center rounded-md bg-white py-1.5 my-4 mt-4 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0"
                            onClick={() => setIsOpen(false)}
                          >
                            Cancel
                          </button>
                          </div>
                        </div>

                      </form>
            
                    
                      </div>
                    </div>
                    </>
                    ))}
                  </div>
      </div>
    </Authenticated>
  )
}
