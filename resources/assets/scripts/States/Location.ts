import { C } from '@entities/C';

/**
 * ...
 */
class Location {
    /**
     * ...
     *
     * @type string
     */
    private state: C.location;

    /**
     * ...
     *
     * @param state { C.location }
     *   ...
     */
    public constructor(state: C.location = C.location.OUTSIDE) {
        this.state = state;
    }

    /**
     * ...
     *
     * @return void
     */
    public setInside(): void {
        this.state = C.location.INSIDE;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isInside(): boolean {
        return this.state === C.location.INSIDE;
    }

    /**
     * ...
     *
     * @return void
     */
    public setOutside(): void {
        this.state = C.location.OUTSIDE;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isOutside(): boolean {
        return this.state === C.location.OUTSIDE;
    }
}

export default Location;
