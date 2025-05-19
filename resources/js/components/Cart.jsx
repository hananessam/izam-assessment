import { Box, Typography } from '@mui/material';

export default ({ cartOpen, setCartOpen }) => {
    return (
        <>
            {cartOpen && (
                <Box className="h-[100vh] w-[100vw] fixed top-0 right-0 bg-black/50 z-[100]">
                    <Box className="flex flex-col items-center justify-start h-[100vh] w-[50vw] absolute top-0 right-0 bg-white shadow-lg">
                        <Box className="flex items-center justify-between w-full max-w-4xl p-4 bg-white border-b border-gray-200">
                            {/* close */}
                            <Box>
                                <Typography className="text-3xl font-bold">Cart</Typography>
                            </Box>
                            <Box className="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full cursor-pointer" onClick={() => { setCartOpen(false)}}>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    className="w-6 h-6 text-gray-600"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        strokeWidth={2}
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </Box>
                        </Box>
                    </Box>
                </Box>
            )}
        </>
    );
};