import { usePage, Link } from '@inertiajs/react';
import { CloudArrowUpIcon, LockClosedIcon, ServerIcon } from "@heroicons/react/20/solid";

export default function viewScholarship({ requirements, scholarshipuses, criteria }) {
  const {scholarshipInfo} = usePage().props;
  console.log(scholarshipInfo);
  return (
    <div>
    {scholarshipInfo == 'null' 
      ? <h1>Please select a scholarship to view </h1>
      : <div className="mx-auto min-h-screen lg:mx-0">
          {scholarshipInfo.map(({id, deadline, name, description, additional_information, activeYear}) => (
          <div className='mx-auto'>
            <div key={id}>
              <div className="flex justify-between mb-2">
                <p className="text-base font-light leading-2 text-red-800">Deadline - {deadline} </p>
                <Link
                    href={route('scholar.apply', {id})}
                    className="rounded-md bg-indigo-600 px-6 pt-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Apply
                </Link>
              </div>
              <h2 className="-mt-1 text-2xl font-bold tracking-tight text-black sm:text-4xl">{name}</h2>
              <p className="mt-6 text-lg leading-8 text-gray-600">
                {description}
              </p>
              <p className="mt-2 text-lg leading-8 text-gray-600">
                {additional_information}
              </p>
            </div>
               <div className="lg:pr-4">
                <div className="max-auto text-base leading-7 text-gray-700 lg:max-auto">
                  <h2 className="mt-4 text-2xl font-bold tracking-tight text-gray-900">Requirements</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {requirements.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <CloudArrowUpIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-indigo-600" />
                      <span>
                        <strong className="font-semibold text-gray-600">{name}</strong>
                      </span>
                    </li>
                  ))}
                  </ul>
                  <h2 className="mt-8 text-2xl font-bold tracking-tight text-gray-900">Criteria</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {criteria.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <CloudArrowUpIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-indigo-600" />
                      <span>
                        <strong className="font-semibold text-gray-600">{name}</strong>
                      </span>
                    </li>
                  ))}
                  </ul>

                  <h2 className="mt-8 text-2xl font-bold tracking-tight text-gray-900">Scholarship Uses</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {scholarshipuses.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <CloudArrowUpIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-indigo-600" />
                      <span>
                        <strong className="font-semibold text-gray-600">{name}</strong>
                      </span>
                    </li>
                  ))}
                  </ul>

                  <p className="mt-8">
                    
                  </p>
                  <h2 className="mt-16 text-2xl font-bold tracking-tight text-gray-900"></h2>
                  <p className="mt-6">
                    
                  </p>
                </div>
             
            </div>
          </div> 
          

          ))}
        </div>
    }
    </div>
  )
}