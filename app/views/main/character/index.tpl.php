{% extends main/base %}

{% block content %}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Campaign</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        {% for char in characters %}
            <tr>
                <td>{{char.name}}</td>
                <td>{{char.campaign.name}}</td>
                <td>Edit Link</td>
                <td>Delete Link</td>
            </tr>
        {% empty %}
           <tr>
               <td colspan="4">:'( you have no characters....</td>
           </tr>

        {% endfor %}
        </tbody>
    </table>
    <a href='/character/add'>Add a Character</a>
{% endblock %}