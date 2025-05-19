const RefreshToken = async (token) => {
    const response = await fetch('/api/auth/refresh-token', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
    });

    return response.json();
};

export default RefreshToken;
