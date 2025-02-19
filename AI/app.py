from flask import Flask, request, jsonify
from flask_cors import CORS
import pandas as pd
import numpy as np
import pickle

app = Flask(__name__)
CORS(app)

df = pd.read_pickle('destinations.pkl')

with open('cosine_sim.pkl', 'rb') as file:
    cosine_sim = pickle.load(file)

@app.route('/recommendations', methods=['GET'])
def recommendations():
    name = request.args.get('name')
    if name is None:
        return jsonify({'error': 'Destination name not provided'}), 400

    if name not in df['Name'].values:
        return jsonify({'error': 'Destination not found'}), 404

    recommended_destinations = get_recommendations(name)
    return jsonify({'recommendations': recommended_destinations})

def get_recommendations(name):
    target_index = df.index[df['Name'] == name][0]

    sim_scores = list(enumerate(cosine_sim[target_index]))
    sim_scores = sorted(sim_scores, key=lambda x: x[1], reverse=True)
    sim_scores = sim_scores[1:4]
    recommended_indices = [i[0] for i in sim_scores]
    recommended_destinations = df.iloc[recommended_indices].to_dict(orient='records')
    return recommended_destinations

if __name__ == '__main__':
    app.run(debug=True)
