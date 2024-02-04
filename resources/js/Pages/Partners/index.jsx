import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, usePage, Link} from "@inertiajs/react";
import React from 'react';
import { BuildingOfficeIcon} from "@heroicons/react/24/solid";
import CreatePartner from "./create_Partner";


export default function Index({auth, partners}) {

  return (
    <Authenticated
      user={auth.user}
      header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">partners</h2>}
      breadcrumb={<span><Link href={route('partner.list')}>Partner list</Link></span>} >
      
      <Head title="Partners" />

      <div class="w-full px-6 py-6 mx-auto">
          <div class="w-full max-w-full px-3 xl:w-3/3 xl:flex-none mb-10">
            <div class="flex flex-wrap -mx-3">
              <div class="sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-full px-3 lg:flex-none mt-4">
                  <CreatePartner />
              </div>

              {partners.map(({id, organization_name, contact_name, email, phones, address, consent}) => (
                <>
                  <div class="sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-full px-3 lg:flex-none mt-4" key={id}>
                    <Link className="items-center" href={route('partner.show', id)}>
                      <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border items-center">
                      
                        <div class="p-4 mx-[15%] mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                          <div class="sm:w-full text-center bg-center icon bg-gradient-to-tl from-red-900 to-red-500 shadow-soft-2xl rounded-xl items-center">
                            <BuildingOfficeIcon className="h-20 w-20 p-4 text-white" />
                          </div>
                        </div>
                        <div class="flex-auto p-4 pt-0 text-center">
                          <p class="mb-0 text-center md:text-base lg:text-lg text-gray-700">{organization_name}</p>
                          <span class="leading-tight text-sm">{contact_name}</span>
                          <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                          <p class="mb-0 md:text-sm text-gray-700 ">{email}</p>
                        </div>
                       
                      </div>
                    </Link>
                  </div>
                  </>
              ))}


                  {/* <div class="w-1/4 max-w-full px-3 mt-6 md:mt-0 md:flex-none">
                    <div class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                      <div class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                        <div class="w-16 h-16 text-center bg-center icon bg-gradient-to-tl from-red-700 to-pink-500 shadow-soft-2xl rounded-xl">
                          <i class="relative text-white opacity-100 fab fa-paypal text-xl top-31/100"></i>
                        </div>
                      </div>
                      <div class="flex-auto p-4 pt-0 text-center">
                        <h6 class="mb-0 text-center">Paypal</h6>
                        <span class="leading-tight text-xs">Freelance Payment</span>
                        <hr class="h-px my-4 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
                        <h5 class="mb-0">$455.00</h5>
                      </div>
                    </div>
                  </div> */}

                </div>
              </div>
            </div>
      
  


    </Authenticated>
  );
}