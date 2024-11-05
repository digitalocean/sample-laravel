import { usePage, Link, useForm } from '@inertiajs/react';
import { ArrowLongRightIcon, ArrowRightCircleIcon, CloudArrowUpIcon, LockClosedIcon, ServerIcon } from "@heroicons/react/20/solid";

export default function viewScholarship({ requirements, scholarshipuses, criteria, scholarshipQuestion }) {
  const {scholarshipInfo} = usePage().props;
  const {data, setData, post, processing, errors, reset } = useForm({
    answer: ''
  });

  const submit = (e) => {
    e.preventDefault();
    post(route('scholar.apply', {id}));
};

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
                <button
                    href={submit}
                    className="rounded-md bg-indigo-600 px-6 pt-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    Apply
                </button>
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
                  <h2 className="mt-4 text-lg font-bold tracking-tight text-gray-900">Requirements:</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {requirements.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <ArrowRightCircleIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-red-800" />
                      <span>
                        <strong className="font-medium text-gray-500">{name} - uploaded to platform are sent directly to Black Scholars Organization</strong>
                      </span>
                    </li>
                  ))}
                  </ul>
                  <h2 className="mt-8 text-lg font-bold tracking-tight text-gray-900">Criteria:</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {criteria.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <ArrowRightCircleIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-red-800" />
                      <span>
                        <strong className="font-medium text-gray-500">{name}</strong>
                      </span>
                    </li>
                  ))}
                  </ul>

                  <h2 className="mt-8 text-lg font-bold tracking-tight text-gray-900">Scholarship Uses:</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600">
                  {scholarshipuses.map(({id,name}) => (
                    <li key={id} className="flex gap-x-3">
                      <ArrowRightCircleIcon aria-hidden="true" className="mt-1 h-5 w-5 flex-none text-red-800" />
                      <span>
                        <strong className="font-medium text-gray-500">{name}</strong>
                      </span>
                    </li>
                  ))}
                  </ul>

                  <h2 className="mt-8 text-lg font-bold tracking-tight text-gray-900">Additional Scholarship Questions:</h2>
                  <ul role="list" className="mt-2 space-y-8 text-gray-600 w-full">
                  <form onSubmit={submit}>
                  {scholarshipQuestion.map(({id,question}) => (
                    <li key={id} className="flex gap-x-1 mb-4">
                        <div class="min-w-full">
                        <label for="about" class="block text-sm/6 font-medium text-gray-900">{question}</label>
                        <div class="mt-2">
                          <textarea
                              id="question"
                              name="question"
                              label={question}
                              value={data.answer}
                              onChange={(e) => setData('answer', e.target.value)}
                              rows={4}
                              className="block w-full rounded-md border-0 px-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                              defaultValue={''}
                              />
                      </div>
                        <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences to answer the question.</p>
                      </div>
                    </li>
                  ))}
                  </form>
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