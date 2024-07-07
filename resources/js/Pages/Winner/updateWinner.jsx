import { Fragment, useRef, useState } from 'react';
import { router, usePage, useForm } from '@inertiajs/react'
import { Dialog, Transition } from '@headlessui/react';
import { CheckIcon  } from '@heroicons/react/24/outline';
import YearlySelection from './updateyearSelection';

export default function UpdateWinner({ winners, winnersID}) {

  var i = winners;
  var d = winnersID;
  console.log(d);

  const {data, setData} = useForm({
    award_payments:'',
    distributionDate:'',
  })

  let [isOpen, setIsOpen] = useState(false)

  const cancelButtonRef = useRef(null);
  
  const [selectedFrequnecy, setSelectedFrequnecy] = useState([]);

  function closeModal() {
    setIsOpen(false)
  }

  function openModal() {
    setIsOpen(true)
  }
  

  function handleSubmit(e) {
    e.preventDefault()
    router.post(route('update.winner', [d]), [data]);
  }

  return (
    <>
        <button
          onClick={openModal}
          className="text-indigo-700 hover:text-red-800"
        >
          Update Scholarship
        </button>
      

      <Transition appear show={isOpen} as={Fragment}>
        <Dialog as="div" className="relative z-10" initialFocus={cancelButtonRef} onClose={setIsOpen}>
          <Transition.Child
            as={Fragment}
            enter="ease-out duration-300"
            enterFrom="opacity-0"
            enterTo="opacity-100"
            leave="ease-in duration-200"
            leaveFrom="opacity-100"
            leaveTo="opacity-0"
          >
            <div className="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
          </Transition.Child>

          <div className="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div className="flex min-h-full items-end justify-center p-4 text-left sm:items-center sm:p-0">
              <Transition.Child
                as={Fragment}
                enter="ease-out duration-300"
                enterFrom="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                enterTo="opacity-100 translate-y-0 sm:scale-100"
                leave="ease-in duration-200"
                leaveFrom="opacity-100 translate-y-0 sm:scale-100"
                leaveTo="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
              >
                <Dialog.Panel className="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl sm:p-6">
                  <div>
                    <div className="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-green-100">
                      <CheckIcon className="h-6 w-6 text-green-600" aria-hidden="true" />
                    </div>
                    <div className="mt-3 text-center sm:mt-5">
                      <Dialog.Title as="h3" className="text-base font-semibold leading-6 text-gray-900">
                        Award Scholarship
                      </Dialog.Title>
                      <div className="mt-2">
                      <form onSubmit={handleSubmit}>
                        <div className="space-y-12">

                          <div className="border-b border-gray-900/10 pb-8">
                            {/* <p className="mt-1 text-sm text-left leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> */}

                            <div className="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                              


                              <div className="sm:col-span-3">
                                <label htmlFor="award_payments" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Award Amount
                                </label>
                                <div className="mt-2">
                                  <input
                                    id="award_payments"
                                    name="award_payments"
                                    value={data.award_payments}
                                    type="text"
                                    autoComplete="award_payments"
                                    onChange={e => setData('award_payments', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder={i.award_payments}
                                 />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="distributionDate" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Distribution Date
                                </label>
                                <div className="mt-2">
                                  <input
                                    type="date"
                                    name="distributionDate"
                                    value={data.distributionDate}
                                    id="distributionDate"
                                    autoComplete="distributionDate"
                                    onChange={e => setData('distributionDate', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-600 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder={i.distributionDate}
                                 />
                                </div>
                              </div>

                              <div className="sm:col-span-6">
                                  <label htmlFor="frequnecy" className="block text-base text-left font-medium leading-6 text-gray-900">
                                      Selection Criteria
                                   </label>
                             
                                 <YearlySelection selectedFrequnecy={selectedFrequnecy} setSelectedFrequnecy={setSelectedFrequnecy} />
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
                  </div>
                  
                </Dialog.Panel>
              </Transition.Child>
            </div>
          </div>
        </Dialog>
      </Transition>
    </>
  )
}
