import { Fragment, useRef, useState } from 'react';
import { useForm } from '@inertiajs/react'
import { Dialog, Transition } from '@headlessui/react';
import { CheckIcon, PlusIcon  } from '@heroicons/react/24/outline';
import TextInput from '@/Components/TextInput';
import Checkbox from '@/Components/Checkbox';


export default function CreatePartner() {
  const { data, setData, post, processing, errors } = useForm({
    organization_name: '',
    contact_name: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    state: '',
    zip: '',
    consent: false, 
  })

  let [isOpen, setIsOpen] = useState(false)

  const cancelButtonRef = useRef(null);

  function closeModal() {
    setIsOpen(false)
  }

  function openModal() {
    setIsOpen(true)
  }
  
  // function handleChange(e) {
  //   const key = e.target.id;
  //   const value = e.target.value
  //   setData(data => ({
  //       ...data,
  //       [key]: value,
  //   }))
  // }

  function handleSubmit(e) {
    e.preventDefault()
    post(route('partner.create'));
  }

  return (
    <>

        <button className="items-center w-full" onClick={openModal}>
          <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border items-center h-52">
          
            <div class="p-4 mx-[25%] mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <div class="text-center bg-center icon bg-gradient-to-tl from-red-700 to-pink-500 shadow-soft-2xl rounded-xl">
                <PlusIcon className="text-white h-12 w-12 p-4" />
              </div>
            </div>
            <div class="flex-auto p-4 pt-0 text-center">
              <p class="mb-0 text-center md:text-base lg:text-lg text-gray-700">Create New Partner</p>
            </div>
          
          </div>
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
                        Create Partner
                      </Dialog.Title>
                      <div className="mt-2">
                      <form onSubmit={handleSubmit}>
                        <div className="space-y-12">
                          <div className="border-b border-gray-900/10 pb-8">
                  
                            <div className="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                              <div className="col-span-full">
                                <label htmlFor="street-address" className="block text-base text-left font-medium leading-6 text-gray-900">
                                  Name of Partner
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    type="text"
                                    name="organization_name"
                                    value={data.organization_name}
                                    id="organization_name"
                                    autoComplete="organization_name"
                                    onChange={(e) => setData('organization_name', e.target.value)}
                                    className="mt-1 block w-full"
                                  />
                                </div>
                              </div>
                            </div>
                          </div>

                          <div className="border-b border-gray-900/10 pb-8">
                            <h2 className="text-base text-left font-semibold leading-7 text-gray-900">Contact Information</h2>
                            {/* <p className="mt-1 text-sm text-left leading-6 text-gray-600">Use a permanent address where you can receive mail.</p> */}

                            <div className="mt-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                              <div className="sm:col-span-3">
                                <label htmlFor="first-name" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Contact Name
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    type="text"
                                    name="contact_name"
                                    value={data.contact_name}
                                    id="contact_name"
                                    autoComplete="contact_name"
                                    onChange={(e) => setData('contact_name', e.target.value)}
                                    className="mt-1 block w-full"
                                  />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="first-name" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Contact email
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    id="email"
                                    autoComplete="email"
                                    onChange={(e) => setData('email', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="ex: 2000"
                                  />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Phone
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    id="phone"
                                    name="phone"
                                    value={data.phone}
                                    type="text"
                                    autoComplete="phone"
                                    onChange={(e) => setData('phone', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                    placeholder="ex: 716 508 9999"
                                 />
                                </div>
                              </div>

                              <div className="sm:col-span-3">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Address
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    id="address"
                                    name="address"
                                    value={data.address}
                                    type="text"
                                    autoComplete="address"
                                    onChange={(e) => setData('address', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 />
                                </div>
                              </div>
                              <div className="sm:col-span-2">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  City
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    id="city"
                                    name="city"
                                    value={data.city}
                                    type="text"
                                    autoComplete="city"
                                    onChange={(e) => setData('city', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 />
                                </div>
                              </div>
                              <div className="sm:col-span-2">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  State
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    id="state"
                                    name="state"
                                    value={data.state}
                                    type="text"
                                    autoComplete="state"
                                    onChange={(e) => setData('state', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 />
                                </div>
                              </div>
                              <div className="sm:col-span-2">
                                <label htmlFor="email" className="block text-sm text-left font-medium leading-6 text-gray-900">
                                  Zip
                                </label>
                                <div className="mt-2">
                                  <TextInput
                                    id="zip"
                                    name="zip"
                                    value={data.zip}
                                    type="text"
                                    autoComplete="zip"
                                    onChange={(e) => setData('zip', e.target.value)}
                                    className="block w-full rounded-md border-0 py-2 px-4 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                                 />
                                </div>
                              </div>

                              <div className="relative flex items-start sm:col-span-full">
                                                  
                                <div className="ml-3 text-base leading-6">
                                  <label className="flex items-center">
                                      <Checkbox
                                          name="consent"
                                          checked={data.consent}
                                          onChange={(e) => setData('consent', e.target.checked)}
                                      />
                                      <span className="ml-2 text-base text-gray-800">Consent <br/> I acknowledge and give permission for Black Scholars to use our scholarship information fund on the public facing website for students.</span>
                                  </label>
                                </div>
                              </div>

                            </div>
                          </div>

                          
                        </div>

                        <div className="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                          <button
                            type="submit"
                            className="inline-flex w-full px-2 py-3 my-4 font-bold justify-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102 sm:col-start-2" disabled={processing}
                            onClick={() => setIsOpen(false)}
                          >
                            Submit
                          </button>
                          <button
                            type="button"
                            className="mt-3 inline-flex w-full justify-center rounded-md bg-white py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0"
                            onClick={() => setIsOpen(false)}
                            ref={cancelButtonRef}
                          >
                            Cancel
                          </button>
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
