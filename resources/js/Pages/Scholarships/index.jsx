import React from 'react';
import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link } from "@inertiajs/react";
import Table from "././partials/Table";
import { PresentationChartBarIcon, CurrencyDollarIcon } from '@heroicons/react/24/solid';

export default function Scholarship({auth}) {
  const {allScholaships} = usePage().props;
  const {data} = allScholaships;

  const totalScholarshipamount = data.reduce((a, c) => a + c.fund_amount, 0);


  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Scholarships</h2>}
      breadcrumb={<span><Link href={route('scholarship.list')}>Scholarship list</Link></span>} >
      
      <Head title="Scholarships" />

      <div className="w-full px-6 py-6 mx-auto">
        {/* Data count cards */}
        <div className="flex flex-wrap -mx-1">
          {/* <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
              <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div className="flex-auto p-4">
                    <div className="flex flex-row -mx-3">
                    <div className="flex-none w-2/3 max-w-full px-3">
                        <div>
                        <p className="mb-0 font-sans font-semibold leading-normal text-base">New Scholarships</p>
                        <h5 className="mb-0 font-bold">
                            4
                            <span className="leading-normal text-sm font-weight-bolder text-lime-500">+3%</span>
                        </h5>
                        </div>
                    </div>
                    <div className="px-3 text-right basis-1/3">
                        <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-700 to-pink-500">
                        <i className="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                        </div>
                    </div>
                    </div>
                </div>
              </div>
          </div> */}

          {/* <!-- card2 --> */}
          <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/3">
              <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="flex-auto p-4">
                  <div className="flex flex-row -mx-3">
                  <div className="flex-none w-2/3 max-w-full px-3">
                      <div>
                      <p className="mb-0 font-sans font-semibold leading-normal text-base">Total Scholarships</p>
                      <h5 className="mb-0 font-bold">
                      {data.length}
                      </h5>
                      </div>
                  </div>
                  <div className="px-3 text-right basis-1/3">
                      <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                        <PresentationChartBarIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>

          {/* <!-- card3 --> */}
          {/* <div className="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
              <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="flex-auto p-4">
                  <div className="flex flex-row -mx-3">
                  <div className="flex-none w-2/3 max-w-full px-3">
                      <div>
                      <p className="mb-0 font-sans font-semibold leading-normal text-base">New Scholarship Dollars</p>
                      <h5 className="mb-0 font-bold">
                          +500
                          <span className="leading-normal text-red-600 text-sm font-weight-bolder">-2%</span>
                      </h5>
                      </div>
                  </div>
                  <div className="px-3 text-right basis-1/3">
                      <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-700 to-pink-500">
                      <i className="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div> */}

          {/* <!-- card4 --> */}
          <div className="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/3">
              <div className="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="flex-auto p-4">
                  <div className="flex flex-row -mx-3">
                  <div className="flex-none w-2/3 max-w-full px-3">
                      <div>
                      <p className="mb-0 font-sans font-semibold leading-normal text-base">Total Scholarship Dollars</p>
                        
                        { totalScholarshipamount === '0'
                          ? <span className="text-4xl text-black ml-5">$0.00</span>
                          : <h5 className="mb-0 font-bold">${totalScholarshipamount.toFixed(2)}</h5>
                        }
                      
                      </div>
                  </div>
                  <div className="px-3 text-right basis-1/3">
                      <div className="inline-block w-12 h-12 text-center rounded-lg bg-gradient-to-tl from-red-900 to-red-500">
                      <CurrencyDollarIcon className='leading-none w-6 h-6 relative top-3.5 text-white'/>
                      </div>
                  </div>
                  </div>
              </div>
              </div>
          </div>
        </div>
        <div className="py-6">
          {/* <Table data={data}/> */}
          <Table allScholaships={allScholaships} />
        </div>
        
      </div>

    </Authenticated>
  );
}