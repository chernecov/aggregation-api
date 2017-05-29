# aggregation-api
RabbitMQ based requests aggregator

Config:

old_sound_rabbit_mq:
    connections:
        default:
            host:     'host'
            port:     5672
            user:     'user'
            password: 'pass'
            vhost:    'vhost'
            lazy:     false

POST:

    {
      "requests": [
        {
          "id": "1",
          "method": "GET",
          "path": "<some endpoint to fetch data from>"
        },
        {
          "id": "2",
          "method": "GET",
          "path": "<some endpoint to fetch data from>"
        }
      ]
    }