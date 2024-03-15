import Authenticated from "@/Layouts/AuthenticatedLayout";
import { Head, Link, usePage } from "@inertiajs/react";
import CreateScholarship from "./createScholarship";

export default function Show({auth, scholarship, applications, otherscholarship, requirements, scholarshipuses, criteria, role}) {
  //const {applications} = usePage().props;

  function classNames(...classes) {
    return classes.filter(Boolean).join(' ')
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

      {scholarship?.map(({id, name, 
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
      <div className="w-full px-6 py-6 mx-auto">
        <div className="relative flex items-center p-0 -mt-6 overflow-hidden bg-center bg-cover min-h-75 rounded-2xl bg-gray-200">
          <span className="absolute inset-y-0 w-full h-full bg-center bg-cover bg-gradient-to-br from-red-800 to-red-700 opacity-80"></span>
        </div>
        <div className="relative flex flex-col flex-auto min-w-0 p-4 mx-6 -mt-16 overflow-hidden break-words border-0 shadow-blur rounded-2xl bg-white/100 bg-clip-border backdrop-blur-2xl backdrop-saturate-200">
          <div className="flex flex-wrap -mx-3">
            <div className="flex-none w-auto max-w-full px-3">
              <div className="text-base ease-soft-in-out h-18.5 w-18.5 relative inline-flex items-center justify-center rounded-xl text-white transition-all duration-200">
                <img src="../assets/img/bruce-mars.jpg" alt="profile_image" className="w-full shadow-soft-sm rounded-xl" />
              </div>
            </div>
            <div key={id}className="flex-none w-auto max-w-full px-3 my-auto">
              <div className="h-full">
                <h5 className="mb-1">{name} </h5>
              </div>
            </div>
            <div className="w-full max-w-full px-3 mx-auto mt-4 sm:my-auto sm:mr-0 md:w-1/2 md:flex-none lg:w-4/12">
              <div className="relative right-0">
                <ul className="relative flex flex-wrap p-1 list-none bg-transparent rounded-xl" nav-pills role="tablist">
                  {/* <li className="z-30 flex-auto text-center">
                    <a className="z-30 block w-full px-0 py-1 mb-0 transition-all border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                      <svg className="text-slate-700" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path className="fill-slate-800" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path className="fill-slate-800" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span className="ml-1">Messages</span>
                    </a>
                  </li> */}
                  <li className="z-30 flex-auto text-center">
                    <p className="z-30 block w-full px-0 py-1 mb-0 transition-colors border-0 rounded-lg ease-soft-in-out bg-inherit text-slate-700" nav-link href="javascript:;" role="tab" aria-selected="false">
                      <svg className="text-slate-700" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>settings</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(304.000000, 151.000000)">
                                <polygon className="fill-slate-800" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                <path className="fill-slate-800" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                <path className="fill-slate-800" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                      <span className="ml-1">fund amount
                        {fund_amount == null
                          ? <span className="text-4xl text-black ml-5">$0.00</span>
                          : <span className="text-4xl text-black ml-5">{fund_amount.toFixed(2)}</span>
                        }
                      </span>
                    </p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      
      </div>

      <div className="w-full p-6 mx-auto">
        <div className="flex flex-wrap -mx-3">
          <div className="w-full max-w-full px-4 lg-max:mt-6 xl:w-8/12">
            <div className="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <div className="flex flex-wrap -mx-3">
                  <div className="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                    <h6 className="mb-0">Scholarship description</h6>
                  </div>
                  <div className="w-full max-w-full px-3 text-right shrink-0 md:w-4/12 md:flex-none">
                    <a href="javascript:;" data-target="tooltip_trigger" data-placement="top">
                      <i className="leading-normal fas fa-user-edit text-sm text-slate-400"></i>
                    </a>
                    <div data-target="tooltip" className="hidden px-2 py-1 text-center text-black bg-black rounded-lg text-sm" role="tooltip">
                      Edit Profile
                      <div className="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']" data-popper-arrow></div>
                    </div>
                  </div>
                </div>
              </div>
              <div className="flex-auto p-2">
                <p className="leading-normal text-sm mx-2">{description}</p>
                <hr className="h-px my-6 bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                <h6 className="mb-0">Additional Information</h6>
                <p className="leading-normal text-sm mx-2">{additional_information}</p>
              </div>
            </div>
          </div>
          <div className="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div className="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="px-4 pt-4 mb-0 bg-white border-b-0 rounded-t-2xl">
                <div className="flex flex-wrap -mx-3">
                  <div className="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                    <h6 className="mb-0">Criteria</h6>
                  </div>
                </div>
              </div>
              <div className="flex-auto px-4">
                <ul className="flex flex-col pb-2 pl-0 mb-0">
                  {criteria?.map(({id, name, }) => (
                        <>
                            
                            <li className="text-slate-700">{name}</li>
                    
                        </>
                    ))}
                </ul>

                <ul className="flex flex-col pl-0 mb-0">
                  <li className="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-t-lg text-sm text-inherit"><strong className="text-slate-700">Award based on:</strong> &nbsp; {award_based_on}</li>
                  <li className="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong className="text-slate-700">Uses:</strong> 
                    <ul>
                      {scholarshipuses?.map(({id, name, }) => (
                        <>
                            
                            <li className="text-slate-700">{name}</li>
                    
                        </>
                      ))}
                    </ul>
                  </li>
                  
                  <li className="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit"><strong className="text-slate-700">Rquirements:</strong>
                    <ul>
                      {requirements?.map(({id, name, }) => (
                        <>
                            
                            <li className="text-slate-700">{name}</li>
                    
                        </>
                      ))}
                    </ul>
                  </li>
                  
                 
                  {/* <li className="relative block px-4 py-2 pb-0 pl-0 bg-white border-0 border-t-0 rounded-b-lg text-inherit">
                    <strong className="leading-normal text-sm text-slate-700">Social:</strong> &nbsp;
                    <a className="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center text-blue-800 align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none" href="javascript:;">
                      <i className="fab fa-facebook fa-lg"></i>
                    </a>
                    <a className="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-600" href="javascript:;">
                      <i className="fab fa-twitter fa-lg"></i>
                    </a>
                    <a className="inline-block py-0 pl-1 pr-2 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in bg-none text-sky-900" href="javascript:;">
                      <i className="fab fa-instagram fa-lg"></i>
                    </a>
                  </li> */}
                </ul>
              </div>
            </div>
          </div>
          {/* Additional box area for future messages */}
          {/* <div className="w-full max-w-full px-3 lg-max:mt-6 xl:w-4/12">
            <div className="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="p-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
                <h6 className="mb-0">Messages</h6>
              </div>
              <div className="flex-auto p-4">
                <ul className="flex flex-col pl-0 mb-0 rounded-lg">
                  <li className="relative flex items-center px-0 py-2 mb-2 bg-white border-0 rounded-t-lg text-inherit">
                    <div className="inline-flex items-center justify-center w-12 h-12 mr-4 text-white transition-all duration-200 text-base ease-soft-in-out rounded-xl">
                      <img src="../assets/img/kal-visuals-square.jpg" alt="kal" className="w-full shadow-soft-2xl rounded-xl" />
                    </div>
                    <div className="flex flex-col items-start justify-center">
                      <h6 className="mb-0 leading-normal text-sm">Sophie B.</h6>
                      <p className="mb-0 leading-tight text-xs">Hi! I need more information..</p>
                    </div>
                    <a className="inline-block py-3 pl-0 pr-4 mb-0 ml-auto font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-pro text-xs ease-soft-in hover:scale-102 hover:active:scale-102 active:opacity-85 text-fuchsia-500 hover:text-fuchsia-800 hover:shadow-none active:scale-100" href="javascript:;">Reply</a>
                  </li>
                </ul>
              </div>
            </div>
          </div> */}
          
        </div>
      </div>

      <div className="w-full p-2 mx-auto mb-2"> 
        <div className="sm:col-span-3 mx-4">
          <a
            href={route('scholarship.edit')}
            className="inline-block w-1/5 px-3 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-red-500 hover:shadow-soft-2xl hover:scale-102"
          >
            Edit
          </a>
        </div>
      </div>
      </>
      ))}
      {/* Applications section */}
      <div className="w-full p-6 mx-auto mb-10">
        <div className="flex flex-wrap -mx-3 px-3">
          <div className="w-full max-w-full p-6 lg-max:mt-6 bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
            <div className="sm:flex sm:items-center">
              <div className="sm:flex-auto">
                <h1 className="text-base font-semibold leading-6 text-gray-900">Applications</h1>
                <p className="mt-2 text-sm text-gray-700"></p>
              </div>
              {/* <div className="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <button
                  type="button"
                  className="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102"
                >
                  Create Scholarship
                </button>
              </div> */}
            </div>
            <div className="-mx-4 mt-10 ring-1 ring-gray-300 sm:mx-0 sm:rounded-lg">
              <table className="min-w-full divide-y divide-gray-300">
                <thead>
                  <tr>
                    <th scope="col" className="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                      Name
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                      School 
                    </th>
                    <th
                      scope="col"
                      className="sm:hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                      SAT
                    </th>
                    <th
                      scope="col"
                      className="sm:hidden px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                      ACT
                    </th>
                    <th
                      scope="col"
                      className="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 lg:table-cell"
                    >
                      College / Major
                    </th>

                    <th scope="col" className="relative py-3.5 pl-3 pr-4 sm:pr-6">
                      <span className="sr-only">View</span>
                      View
                    </th>
                  </tr>
                </thead>
                <tbody>
                {applications?.map(({
                  id,
                  scholarship_id,
                  awarded,
                  name,
                  email,
                  submitted_on,
                  phone,
                  parent_name,
                  parent_job,
                  parent_phone,
                  parent_email,
                  applicant_essay,
                  community_service,
                  school,
                  graduation_year,
                  gpa,
                  sat_Scheduled,
                  sat_Score,
                  act_scheduled,
                  act_score,
                  ap_test_name,
                  ap_test_score,
                  ap_test_name2,
                  family_income,
                  siblings,
                  siblings_attending_college,
                  fasfa_acknowledgement,
                  college_choice,
                  college_major,
                  college_status,
                  college_choice2,
                  college_major2,
                  college_status2,
                  scholarship_choice,
                  reference,
                  reference_email1,
                  reference_relationshiip,
                  reference2,
                  reference_email2,
                  reference_relationshiip2,
                  resume_upload,
                  essay_upload,
                  additional_information_upload,
                  }) => (
                    <>
                    <tr key={id}>
                    <td
                        className={classNames('border-t border-gray-200',
                          'relative py-4 pl-4 pr-3 text-sm sm:pl-6'
                        )}
                      >
                        <div className="font-medium text-gray-900">
                          {name}
                        </div>
                        <div className="mt-1 flex flex-col text-gray-700 sm:block lg:hidden">
                          <span>{gpa}</span><br/>
                          <span>{submitted_on}</span>
                        </div>
                      </td>
                      <td
                        className={classNames('border-t border-gray-200',
                          'px-3 py-3.5 text-sm text-gray-900 text-left'
                        )}
                      >
                        <div className="hidden md:block">{school}</div>
                        <div className="lg:hidden">{school}</div>
                      </td>
                      <td
                        className={classNames('border-t border-gray-200',
                          'px-3 py-3.5 text-sm text-gray-900 text-left'
                        )}
                      >
                        <div className="hidden md:block">{sat_Score}</div>
                        <div className="sm:hidden">{sat_Score}</div>
                      </td>
                      <td
                        className={classNames('border-t border-gray-200',
                          'px-3 py-3.5 text-sm text-gray-900 text-left'
                        )}
                      >
                        <div className="hidden md:block">{act_score}</div>
                        <div className="sm:hidden">{act_score}</div>
                      </td>
                      <td
                        className={classNames('border-t border-gray-200',
                          'px-3 py-3.5 text-sm text-gray-900 text-left'
                        )}
                      >
                        <div className="sm:hidden">{college_choice}</div>
                        <div className="hidden sm:block">{college_choice} - {college_major}</div>
                      </td>
                      
                      <td
                        className={classNames('border-t border-gray-200',
                          'relative py-3.5 pl-3 pr-4 text-center text-sm font-medium sm:pr-6'
                        )}
                      >
                        <Link
                          href={route('application.view',id)}
                          className="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-red-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102"
                        >
                          Resume
                        </Link>
                      </td>
                    </tr>
                    </>
                  ))}
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
      {/* additional scholarships by partner */}
      <div className="w-full p-6 mx-auto">
        <div className="flex flex-wrap -mx-3">
          <div className="flex-none w-full max-w-full px-3 mt-6">
            <div className="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
              <div className="p-4 pb-0 mb-0 bg-white rounded-t-2xl">
                <h6 className="mb-1">Other Scholarships</h6>
                <p className="leading-normal text-sm">Addition scholarships provided:</p>
              </div>
              <div className="flex-auto p-4">
                <div className="flex flex-wrap -mx-3">
                {otherscholarship?.map(({id, name, 
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
                  <div key={id} className="w-full max-w-full px-3 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div className="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border mb-6">
                      <div className="relative">
                        <a className="block shadow-xl rounded-2xl">
                          <img src="../assets/img/home-decor-1.jpg" alt="img-blur-shadow" className="max-w-full shadow-soft-2xl rounded-2xl" />
                        </a>
                      </div>
                      <div className="flex-auto px-1 pt-6">
                        <p className="relative z-10 mb-2 leading-normal text-transparent bg-gradient-to-tl from-gray-900 to-slate-800 text-sm bg-clip-text">Scholarship amount {fund_amount}</p>
                        <a href="javascript:;">
                          <h5>{name}</h5>
                        </a>
                        <p className="mb-6 leading-normal text-sm truncate ...">{description}</p>
                        <div className="flex items-center justify-between">
                          <button type="button" className="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-xs hover:scale-102 active:shadow-soft-xs tracking-tight-soft border-fuchsia-500 text-fuchsia-500 hover:border-fuchsia-500 hover:bg-transparent hover:text-fuchsia-500 hover:opacity-75 hover:shadow-none active:bg-fuchsia-500 active:text-white active:hover:bg-transparent active:hover:text-fuchsia-500">View Scholarship</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </>
                ))}
                  {/* Create new Scholarship for Organization */}
                  <div className="w-full max-w-full px-3 mb-6 md:w-6/12 md:flex-none xl:mb-0 xl:w-3/12">
                    <div className="relative flex flex-col h-full min-w-0 break-words bg-transparent border border-solid shadow-none rounded-2xl border-slate-100 bg-clip-border">
                      <div className="flex flex-col justify-center flex-auto p-6 text-center">
                        <CreateScholarship />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </Authenticated>
  );
}