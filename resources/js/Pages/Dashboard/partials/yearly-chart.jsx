import React, { useEffect } from "react";
import {Helmet} from "react-helmet";

export default function Yearlychart() {
    useEffect(() => {
        const chart = new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: ["2020", "2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029"],
                datasets: [
                    {
                        label: "16 Mar 2018",
                        borderColor: "#4A5568",
                        data: [600, 400, 620, 300, 200, 600, 230, 300, 200, 200, 100, 1200],
                        fill: false,
                        pointBackgroundColor: "#4A5568",
                        borderWidth: "3",
                        pointBorderWidth: "4",
                        pointHoverRadius: "6",
                        pointHoverBorderWidth: "8",
                        pointHoverBorderColor: "rgb(74,85,104,0.2)",
                    },
                ],
            },
            options: {
                legend: {
                    position: false,
                },
                scales: {
                    yAxes: [
                        {
                            gridLines: {
                                display: false,
                            },
                            display: false,
                        },
                    ],
                },
            },
        });
    });
    return (
        <>
            <Helmet>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                <script defer src="https://cdn.tuk.dev/dev/light-dark-switch.js"></script>
            </Helmet>
            <div className="flex items-center justify-center py-8 px-4">
                <div className="w-full">
                    <div className="flex flex-col justify-between h-full">
                        <div>
                            <div className="flex items-end mt-2">
                                <h3 className="text-red-800 leading-5 text-lg md:text-2xl">$65,875</h3>
                                <div className="flex items-center md:ml-4 ml-1">
                                    <p className="text-indigo-500 text-xs md:text-base">17%</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width={12} height={12} viewBox="0 0 12 12" fill="none">
                                        <path d="M6 2.5V9.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                        <path d="M8 4.5L6 2.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                        <path d="M4 4.5L6 2.5" stroke="#4338CA" strokeWidth="0.75" strokeLinecap="round" strokeLinejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div className="mt-6">
                            <canvas id="myChart" width={1025} height={400} />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}
