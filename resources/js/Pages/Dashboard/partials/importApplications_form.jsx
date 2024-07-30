import { useForm } from "@inertiajs/react";

export function ImportApplications() {
    
    const { data, setData, post, progress } = useForm({
        // name: null,
        file: null,
      })
      
      function submit(e) {
        e.preventDefault()
        post(route('csv.import.application'), data, {
            forceFormData: true,
        });
      }


    return (
        <div className="mt-4 border-black/12.5 shadow-soft-xl relative flex h-1/3 min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-2">
            <div className="relative h-full overflow-hidden bg-cover rounded-xl">
                <span className="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                <div className="relative z-10 flex flex-col flex-auto h-full p-4">
                <h5 className="pt-2 font-bold text-white">Import bulk Applications</h5>
                <div className='mt-auto'>
                <form onSubmit={submit}>
                        {/* <input type="text" value={data.name} onChange={e => setData('name', e.target.value)} /> */}
                        <input 
                            type="file"
                            accept=".csv"
                            name="file"
                            id="file"
                            className="block w-full px-4 rounded-md border-0 py-1.5 mr-4 bg-white text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        
                            onChange={e => setData('file', e.target.files)} multiple="true" />

                        {progress && (
                        <progress value={progress.percentage} max="100">
                            {progress.percentage}%
                        </progress>
                        )}
                        <button type="submit" className='mt-3 py-1.5 px-3 rounded-lg bg-gradient-to-tl from-red-900 to-red-500 text-white'>Import CSV</button>
                    </form>
                </div>
                {/* <a className="mt-auto mb-0 font-semibold leading-normal text-white group text-base" href="javascript:;">
                    Import
                    <ArrowSmallRightIcon className='fas fa-arrow-right ease-bounce w-4 h-4 group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200'/>
                </a> */}
                </div>
            </div>
        </div>
    );
}